phptest:
	if find . -name "*.php" -exec php -l {} 2>&1 \; | grep "syntax error, unexpected"; then exit 1; fi

zip:
	rm -f livereload.zip
	cp -r src/ livereload
	zip -r livereload.zip livereload
	rm -r livereload

.PHONY: zip
