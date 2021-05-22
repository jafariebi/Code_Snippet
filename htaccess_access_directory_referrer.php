RewriteEngine on
# Options +FollowSymlinks
RewriteCond %{HTTP_REFERER} !ejafari\.ir [NC] 
RewriteRule .* - [F]
