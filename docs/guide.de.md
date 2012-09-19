Phundament 3
============

Quick Start Tutorial
====================

Author: Tobias Munk


<br>
<br>
<br>
<br>
<br>
*https://github.com/phundament/app/blob/master/docs/guide.de.md*


Einleitung
----------

### Warum Phundament?

### Die Idee

... oder besser gesagt der Wunsch war es, verschiedenste Open Source Software, zusammengestellt nach eigenen Wünschen zu einer Applikation zusammenzubauen.

In der Theorie ist das ganz einfach, praktisch für jede Anforderung existiert eine Bibliothek oder ein Plugin. Jedoch in der Praxis steht man als Entwickler immer wieder ähnlich gelagerten Herausforderungen gegenüber, welche da wären:

 * Application Bootstrapping
 * Konfiguration
 * Updates, Patches, Fixes
 * Erweiterbarkeit
 * Kompatibilität
 * Versionierung
 * Deployment
 * Maintainance

Phundament ist die (PHP)-Lösung für diese Probleme.

Bausteine
---------

### MASP-Stack

In unseren Beispielen: Mac OS X\*, Apache, SQLite\*\*, PHP.

*\*Windows und Linux Support
\*\*MySQL Support*

### Composer

Dependency Manager für PHP; Paket-Meta-Data-Repository via packages.phundament.com

*[Wie füge ich eigene Pakete hinzu?](https://github.com/phundament/app/wiki/Packages)*


### P3Setup

Installation/Setup, Skripte, Yii-Migrations

### Yii Framework

Yes, it is - "The Framework"

### Open Source Ökosystem

#### p3pages

Seitenmanager

#### p3media

Dateimanager, Bildmanipulation

#### p3widgets

Inhaltscontainer

#### yii-user

Benutzerverwaltung

#### yii-rights

Rechteverwaltung

#### yii-bootstrap

Responsive CSS Framework, UI-Komponenten

#### more...

Weitere [Features auf phundament.com](http://phundament.com/en/features-8.p3)


Vorraussetzungen & Entwicklungsumgebung
---------------------------------------

Bevor wir mit der Einrichtung der Applikation beginnen, müssen einige Vorraussetzungen erfüllt sein.

### Software

Details zu den Requirements gibt es online unter [Software und Versionen](https://github.com/phundament/app/blob/master/README.md#requirements).

#### System
 * Shell-access
 * git
 * mercurial
 * subversion
 * PHP OpenSSL
 * LESS compiler


#### LESS compiler

Um später die ersten [LESS](http://lesscss.org/)-Anpassungen am *frontend-Theme* vorzunehmen benötigen wir einen LESS compiler.

 * Linux
 * [Mac OS X - LESS.app](http://incident57.com/less/)
 * Windows
 * PHP server-side*
 * JavaScript client-side*

*\* nicht empfohlen*

Setup
-----

### Virtual Host

Die Einrichtung eines virtuellen Hosts empfiehlt sich bei der weiteren Entwicklung außerordentlich.
Wir werden im weiteren Verlauf die Bezeichnung `http://phundament.local/` verwenden, wenn URLs zur
Phundament Applikation referenziert wird.



Download
--------

Phundament ist [via github](https://github.com/phundament/app/tags) erhältlich.
Stabile Versionen sind als *Tag* gekennzeichnet.

### Struktur
    .
    ├── README.md
    ├── _.htaccess                  (mod_rewrite Einstellungen)
    ├── composer.json               (Paketdefinitionen)
    ├── composer.lock               (Revisionsverzeichnis installierter Pakete)
    ├── composer.phar               ("apt-get")
    ├── favicon.ico
    ├── install
    │   └── P3Setup.php             (Install/Setup-Skript-Trigger)
    ├── protected
    │   └── config
    │       ├── console.p3.php      (yiic Konfiguration)
    │       ├── local-dist.php      (Template für lokale Konfigurationsdatei)
    │       └── main.p3.php         (Hauptkonfigurationsdatei)
    ├── robots.txt
    └── sitemap.xml
.



Konfiguration
-------------

Phundament erstellt in der Werkseinstellung seine Daten in eine SQLite Datenbank.

Die zentrale Konfigurationsdaten von Phundament ist `main.p3.php`, sie inkludiert verschiedene Modulkonfigurationen, sowie die `main.php` aus dem Yii Web Application Skeleton und die `local.php`, sofern vorhanden.

Um zum Beispiel die Datenbankkonfiguration anzupassen, müssen die Einstellungen der Yii db-Komponente angepasst werden.

    $ edit ./protected/config/main.p3.php
Zur Testinstallation sind jedoch keine Änderungen nötig.
    
> Die Datei `local.php` überschreibt Konfigurationseinstellungen für "lokale Besonderheiten" und sollte **nicht mitversioniert** werden.



Installation
------------

Die Einrichtung der Applikation wird folgendermaßen gestartet:

    $ php composer.phar install --dev
Das Kommando `install` installiert die Revisions die in `composer.lock` spezifiert sind.

Die Option `--dev` installiert einige Entwicklerpakete, unter anderem die LESS Quelldateien von
Twitter Bootstrap.

> Während der ersten Installation wird ein Yii Application Skeleton angelegt.

Nach der Installation sollte die App über [http://phundament.local](http://phundament.local) aufgerufen werden können.


### Updates

Wird als Kommando z.b. `update phundament/p3media` verwendet, wird nur dieses Modul auf die
neueste Version aktualisiert, welche in der Datei `composer.json` spezifiert wurde.
Weitere Informationen bei [getcomposer.org](http://getcomposer.org/doc/00-intro.md).

Lösungen für häufig auftretenden Fragen und Probleme sind im Kaptiel [Troubleshooting](https://github.com/phundament/app/blob/master/README.md#troubleshooting) zu finden.



Style
-----

### LESS

Phundament wird mit **zwei Yii Themes**, welche auf
[p3bootstrap](https://github.com/schmunk42/p3bootstrap) basieren installiert, `./themes/frontend` und
`./themes/backend`.


Die ersten Anpassungen der LESS styles sollten hier erfolgen:

`./themes/frontend/less/variables.less`

*Some "PHPish" changes...*

    @bodyBackground:        @white;
    @headingsFontFamily:    @serifFontFamily; // empty to use BS default, @baseFontFamily

    @sansFontFamily:        Verdana, "Helvetica Neue", Helvetica, Arial, sans-serif;

    @lilaHell:              #9898D0;
    @lilaDunkel:            #65669D;

    @navbarText:            @white;
    @navbarLinkColor:       @white;
    @navbarLinkColorHover:  @yellow;
Der LESS compiler der Wahl sollte nun die Datei `./themes/frontend/css/p3.css` neu erzeugen.

*Hinweis: Sollten Änderungen "nicht zu sehen sein" – Browser-Cache leeren und* `./assets/*` *löschen.*


> Phundament kann mit verschiedenen Themes arbeiten. Bootstrap bietet in der Standardkonfiguration eine umfassende Bibliothek an UI Komponenten und ein Responsive Layout.

Content
-------

### Login

Die Phundament Loginseite erreicht man über den *Login* Link rechts oben in der *Navbar*

### Seite übersetzen

*Edit/Create Page Translation* im *Phundament 3* Menu in der *Navbar*.

### Seite erstellen

Layout: `//layouts/main`

View: `//p3pages/default`



### Dateien hochladen

Dateien können dem System über [p3media](http://www.yiiframework.com/extension/p3media) hinzugefügt
werden. Ebenfalls erreichbar über das *Phundament 3* Menu unter *Upload Media*.

### Widget erstellen

Nahezu beliebige Inhalte können der Web-Applikation über [p3widgets](https://github.com/schmunk42/p3widgets)

 * Um ein Widget zu erstellen klickt man im im entsprechenden **Container** auf das "+"-Symbol.
 * Jedes Widget benötigt noch übersetzte Inhalte, um diese zu erstellen klickt man im im entsprechenden **Widget** auf das "+"-Symbol.

### Widget bearbeiten

 * die Übersetzung eines Widgets kann man durch einen Klick auf das "Stift"-Symbol bearbeiten.
 * den Typ eines Widget kann man über den "Schraubenschlüssel" umstellen
 * die Meta Daten lassen sich über einen Klick auf das "i"-Symbol bearbeiten
Die Mediendatenbank `p3media` lässt über den `ckeditor` ansteuern. 

> Bilder sollten in einem *Responsive Layout* keine höhen und Breitenangaben besitzen.

> Inhalte, welche vom Widget selbst generiert werden können über den Platzhalter `{WIDGET_CONTENT}` in das Widget injiziert werden.

Extend
------

### Neue Widgets konfigurieren

    $ php composer.phar require logicoder/videojs
    Please provide a version constraint for the logicoder/videojs requirement: >=0.1
Composer sollte nun das entsprechende Packet herunterladen, es der Datei `composer.json` hinzufügen, wenn nötig
entsprechende Setup Skripte triggern und schließlich auch die Datei `composer.lock` mit der neuen Revisionsinformation aktualisieren.

Das Widget muss nun noch in der Konfiguration `.protected/config/main.p3.php` aktiviert werden.

    'p3widgets' => array(
        'params' => array(
            'widgets' => array(
                    'ext.logicoder.videojs.EVideoJS' => 'Video JS',
                ),
            ),
        ),

In der Widgetkonfiguration können Einstellungen auch als JSON-string eingefügt werden.

    {"_options":{"id":"0","width":"100%","height":"auto","poster":"0","video_mp4":"http://video-js.zencoder.com/oceans-clip.mp4","video_ogv":"0","video_webm":"0","flash_fallback":"1","flash_player":"http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf","controls":"1","preload":"1","autoplay":"0","support":"1","download":"1"},"options":{},"actionPrefix":"NULL","skin":"default"}

    
> Grundsätzlich kann `p3widgets` jedes beliebige Widget, welches von `CWidget` abgeleitet wurde, verwenden.


Deploy
------

### git import

    $ git init
    $ git status
    $ git add <FILES>
    $ git remote add git://myrepo/project origin
    $ git push -u origin master
Standardmäßig werden temporäre Dateien ignoriert, Details hierzu findest Du in der Datei [`.gitignore`](https://github.com/phundament/app/blob/master/.gitignore).

### git clone & composer

Auf dem Produktivsystem kann das Projekt folgendermaßen installiert werden:

    $ git clone git://myrepo/project
    $ php composer.phar install
.

### "Enterprise" Alternativen

tbd ... [weitere Infos](http://getcomposer.org/doc/faqs/should-i-commit-the-dependencies-in-my-vendor-directory.md)

### rsync

Zur Spiegelung der Mediadaten kann das [rsync-command](https://github.com/schmunk42/p3extensions/blob/master/commands/P3RsyncCommand.php) verwendet werden

    $ ./protected/yiic rsync dev prod p3media
.

### Yii migrations vs. database-dumps vs. SQLite versioning

Yii migrations können mit dem [DumpSchemaCommand](https://github.com/schmunk42/p3extensions/blob/master/commands/P3DumpSchemaCommand.php) erzeugt werden.

Die SQLite Datenbank kann über ein explizites `git add ./protected/data/testdrive.db` dem Repository hinzugefügt werden. Als Hinweis sei gesagt, das dies nur für kleinere Projekte zu empfehlen ist, da die Datenbank als Binärdatei behandelt wird.


Contribute
----------

 * Fork [satis branch](https://github.com/phundament/app/blob/satis/composer.json)
 * Paketbeschreibung `composer.json` hinzufügen
 * Pull-Request auf satis Branch einreichen

Wenn der Pull-Request in satis gemerged ist sind die Pakete kurze Zeit später in der Phundament installation über dieses Kommando verfügbar:

    $ php composer.phar show
Es ist auch möglich Paketinformationen über private Pakete direkt in `comoposer.json` zu hinterlegen.

> Composer bietet ein zusätzliches Paketrepository [packagist.org](http://packagist.org/), welches standardmäßig in Phundament deaktiviert ist.


Export
------

Hierzu müssen die entsprechenden URL rules, zusammen mit der mitgelieferten .htaccess Datei aktiviert werden.

Der Export kann mittels wget gestartet werden

    wget -m http://phundament.local/
> Eine Website als statische Applikation zu exportieren unterliegt einigen Einschränkungen, so kann
zum Beispiel keine Serverlogik wie eine Suchfunktion, mitexportiert werden.


Thank you!
----------

Und nicht vergessen ... **[Fork us](https://github.com/phundament/app) on github**







