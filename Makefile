
zip:
	rm -f plg_livereload-snippet.zip
	cd src/; zip -r ../plg_livereload-snippet.zip *

phptest:
	if find . -name "*.php" -exec php -l {} 2>&1 \; | grep "syntax error, unexpected"; then exit 1; fi

.PHONY: zip
