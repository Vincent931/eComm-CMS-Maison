 <h2>Lorsque vous ajoutez une page, pensez à copier ce code en remplaçant les champs en bleu et rouge dans votre .htaccess dans le dossier racine (le plus bas dans l'arborescence ou dossier du site)</h2>
    <p>#exemple.php</p>
    <p>#Réécriture</p>
    <p>RewriteRule ^<span style="color:red">Exemple-Redirige</span>$ <span style="color:blue">exemple.php</span>?stop [QSA,L,NC,S=15]</p>
    <p>RewriteCond %{QUERY_STRING} !stop</p>
    <p>RewriteRule <span style="color:blue">exemple.php</span> <span style="color:red">Exemple-Redirige</span> [r=301,L,nc]</p>
    <p></p>