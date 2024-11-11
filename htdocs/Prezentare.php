<!DOCTYPE html>
<html>
<head><title>Introducere aplicatie</title></head>
<body>
<div id="introducere">
<h1>Introducere</h1>    
<p>Proiectul meu este inspirat de siteul <a href="https://www.uship.com/">uShip</a> si de seria
de pe history channel <a href="https://en.wikipedia.org/wiki/Shipping_Wars">Shipping Wars</a>.
</p>
<p>
Aplicatia mea va permite postarea anunturilor de catre clienti, care doresc sa le fie transportate
diverse obiecte(de la cani/unelte/picturi pana la masini/usi/alte lucruri voluminoase). Clientul va 
posta locatia in care va fi preluat obiectul, locatia in care va trebui lasat obiectul,
timpul in care trebuie realizata comanda cat si suma oferita.</p>
Angajatii(Contractori) site-ului pot sa decida daca doresc sa preia comanda. In cazul in care mai multi
angajati doresc sa preia o comanda, va incepe o licitatie in care contractorii vor cere progresiv 
mai putini bani decat a fost cerut in comanda initiala. La finalul licitatiei, clientul poate sa aleaga
orice contractor care a participat(in majoritatea cazurilor cel care a cerut cel mai putin bani).
</p>
<div id="Arhitectura">
<h1>Descriere arhitectura</h1>
<div id="roluri">
<h3>Roluri</h3>
<ul>
<li>Utilizator neautentificat</li>
<li>Client</li>
<li>Contractor</li>
<li>Moderator</li>
<li>Administrator</li>
</ul>
<h4>Decriere roluri</h4>
<ul>
<li>    
Utilitzator neautentificat: cineva care acceseaza siteul fara sa se autentifice. 
Va putea in principal doar sa vizioneze site-ul(comenzile,useri, contractori, etc)
</li>
<li>
Client: un client. Tot ce poate sa faca un utilizator neautentificat + sa creeze comenzi, sa dea 
report/feedback la contractorii care i-a indeplinit comenzile.
</li>
<li>Contractor: un contractor. Tot ce poata sa faca un utilizator neautentificat + poate sa preia comenzi,
sa dea report/feedback la clientii cu care a lucrat.</li>
<li>Moderator: un moderator. Poate sa vizualizeze rapoartele trimise de clienti/contractori, poate sa suspendeze
utilizatorii, poate sa inchida comenzi/postari, etc</li>

<li>Administrator: un moderator de rank inalt. Poate sa faca tot ce face un moderator + poate sa accepte aplicatiile de 
angajare pentru persoanele care doresc sa fie contractori. Poate sa adauge noi moderatori, poate sa elimine moderatori.
</li> 
</ul>
</div>

<div id="Entitati">
<h3>Entitati principale principale din mysql</h3>
<p>(Posibil ca lista sa se modifice partial pe parcurs) </p>
<ul>
<li>Utilizator</li>
<li>Contractor</li>
<li>Client</li>
<li>Postare(postare a unui utilizator, comanda specifica reprezinta tabela comanda)</li>
<li>Mesaj(private message)</li>
<li>Feedback</li>
<li>Comanda</li>
<li>Oferta(in cazul licitatiilor, trimise de contractori)</li>
<li>Notificare</li>
</ul>
</div>
<div id="Procese">
<h3>Procese ce vor fi efectuate prin mysql</h3>
<ul>
<li>Autentificare/Inregistrare</li>
<li>Creare/Editare/Stergere postari/comenzi</li>
<li>Suspendare utilizatori</li>
<li>Selectare contractor pentru comanda</li>
<li>Trimitere notificari</li>
<li>Trimitere mesaje</li>
<li>Aprobare contractori(pentru administrator)</li>
<li>(Cel mai probabil si altele)</li>
</ul>
</div>
</div>
<div id="Implementare">
<h1>Implementare</h1>
<div id="Frontend">
<h3>Frontend</h3>
<ul>
<li>HTML</li>
<li>Javascript</li>
<li>CSS</li>
</ul>
</div>
<div id="Backend">
<h3>Backend</h3>
<ul>
<li>PHP</li>
<li>Mysql pentru baza de date</li>
</ul>
</div>
<div id="Hostare">
<h3>Hostare</h3>
<p>Infinity free</p>
</div>
</div>

</body>
</html>
