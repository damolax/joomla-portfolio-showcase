import test from 'node:test';
import assert from 'node:assert/strict';
import fs from 'node:fs';
import path from 'node:path';
import vm from 'node:vm';
import { fileURLToPath } from 'node:url';
const repo = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const site = path.join(repo, 'docs', 'aurel-studio');
const htmlFiles = fs.readdirSync(site).filter(f => f.endsWith('.html'));
const read = f => fs.readFileSync(path.join(site,f), 'utf8');
const mustHave = ['index','about','services','projects','team','journal','contact','pricing','faq','process','materials','consultation','privacy','404','coming-soon', ...['bergen','alder','kensington','marlowe','solis','atelier'].map(v=>'project-'+v), ...['slow-spaces','warm-minimalism','natural-light','texture-belonging','beauty-restraint','daily-rituals'].map(v=>'journal-'+v)];
test('Every required page exists', () => { for(const n of mustHave) assert.ok(fs.existsSync(path.join(site,n+'.html')),n); assert.ok(htmlFiles.length>=29,'Expected at least 29 HTML pages'); });
test('All HTML pages have valid local links and referenced assets', () => {
 const broken=[];
 for(const file of htmlFiles){
  const html=read(file);
  assert.match(html, /<title>[^<]+<\/title>/i,file+' missing title');
  if(!['project-detail.html','article.html'].includes(file)){
   assert.match(html, /<main id="main-content">/,file+' missing content landmark');
   assert.match(html, /assets\/logo-light\.svg/,file+' missing brand logo');
  }
  for(const m of html.matchAll(/\b(?:href|src)="([^"]+)"/g)){
   const link=m[1].split('#')[0].split('?')[0];if(!link||/^(https?:|data:|mailto:|tel:|\/\/)/i.test(link))continue;
   const dest=path.resolve(site,link);if(!fs.existsSync(dest))broken.push(file+': '+link);
  }
 }
 assert.deepEqual(broken,[],'Missing target paths');
});
test('Portfolio links to six distinct case studies',()=>{
 const html=read('projects.html');const links=[...html.matchAll(/href="project-([a-z]+)\.html"/g)].map(m=>m[1]);assert.equal(new Set(links).size,6);
});
test('Journal links to six distinct complete stories',()=>{
 const html=read('journal.html');const links=[...html.matchAll(/href="journal-([a-z-]+)\.html"/g)].map(m=>m[1]);assert.equal(new Set(links).size,6);
});
test('Interactive controls are present on appropriate pages',()=>{
 assert.match(read('consultation.html'),/id="brief-form"/);
 assert.match(read('contact.html'),/id="contact-form"/);
 assert.match(read('materials.html'),/data-material="stone"/);
 assert.match(read('project-bergen.html'),/data-lightbox=/);
 assert.match(read('projects.html'),/id="project-search"/);
 assert.match(read('journal.html'),/id="journal-search"/);
});
test('Shared JS has valid syntax',()=>{
 const js=fs.readFileSync(path.join(site,'assets/site.js'),'utf8');assert.doesNotThrow(()=>new vm.Script(js));
});
test('Joomla template has install manifest, content position and brand assets',()=>{
 const root=path.join(repo,'source/joomla/aurel-studio/template');
 const xml=fs.readFileSync(path.join(root,'templateDetails.xml'),'utf8');
 const php=fs.readFileSync(path.join(root,'index.php'),'utf8');
 assert.match(xml,/<name>aurel_studio<\/name>/);
 assert.match(php,/type="component"/);
 assert.match(php,/type="message"/);
 for(const p of ['media/images/logo-light.svg','media/css/site.css','media/css/upgrade.css','media/js/site.js'])assert.ok(fs.existsSync(path.join(root,p)),p);
});