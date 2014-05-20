Ask a question at Stackoverflow
-------------------------------

Usually the quickest way to get a response: [Ask your question at Stackoverflow](http://stackoverflow.com/questions/ask?tags=Phundament)

Troubleshooting
---------------

 * Make sure you have [git](http://git-scm.com/) and [hg](http://mercurial.selenic.com/) installed
 * zlib extension or unzip available on your PATH
 * OpenSSL Support enabled in PHP or try ```--prefer-source```
 * if you get SSL or memory limit errors, try: ```php -d allow_url_fopen=1 -d memory_limit=64M composer.phar -v install```
 * If you want to the very lastest version
   ```
   curl -L https://github.com/phundament/app/tarball/master | tar zx
   ```
 * Don't manually enable Yii `CLogger` on a fresh install
 * To upgrade phundament from a previous version, please follow [these upgrading instructions] (https://github.com/phundament/app/blob/master/UPGRADE.md) 


FAQ
---


 * Q: How can I use my private packages?

   A: See [[Packages]].
   
 * Q: How to change the theme CSS/LESS?
   
   A: See [[LESS]].
  
 * Q: Can I get some Demo-Data?
 
   A: *Work in progress*, will be availble from `waalzer/app-demo-data` in the future.
 
 * Q: How can I place a P3Widget on any page?
 
   A: Edit widget info, set `module`, `controller`, `action` and `requestParam` to `_ALL`