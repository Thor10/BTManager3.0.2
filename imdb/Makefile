# Makefile for imdbphp
# $Id: Makefile,v 1.1 2008/09/21 02:34:43 joerobe Exp $

DESTDIR=
prefix=/usr/local
libdir=$(DESTDIR)/usr/share/php
datarootdir=$(DESTDIR)$(prefix)/share
datadir=$(datarootdir)/imdbphp
docdir=$(datarootdir)/doc/imdbphp
INSTALL=install
INSTALL_DATA=$(INSTALL) -m 644
WEBROOT=$(DESTDIR)/var/www
LINKTO=$(WEBROOT)/imdbphp

install: installdirs
	cp -pr doc/* $(docdir)
	$(INSTALL_DATA) *.class.php $(libdir)
	$(INSTALL_DATA) cache.php imdb.php imdbsearch.php *.html $(datadir)
	if [ ! -e $(LINKTO) ]; then ln -s $(datadir) $(LINKTO); fi

installdirs:
	mkdir -p $(datadir)/cache
	mkdir -p $(datadir)/images
	mkdir -p $(docdir)/apidoc/Api
	mkdir -p $(libdir)
	if [ ! -d $(WEBROOT) ]; then mkdir -p $(WEBROOT); fi

uninstall:
	if [ "`readlink $(LINKTO)`" = "$(datadir)" ]; then rm -f $(LINKTO); fi
	rmdir --ignore-fail-on-non-empty $(datadir)/cache
	rmdir --ignore-fail-on-non-empty $(datadir)/images
	rm -f $(datadir)/*.html
	rm -f $(datadir)/*.php
	rm -f $(libdir)/imdb.class.php $(libdir)/imdb_config.class.php $(libdir)/imdb_request.class.php $(libdir)/browseremulator.class.php
	rmdir --ignore-fail-on-non-empty $(datadir)
	rm -rf $(docdir)
