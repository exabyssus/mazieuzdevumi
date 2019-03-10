# Cubesystems.lv mazais uzdevums

Balstoties uz cubesystems.lv uzdevumu, izveidoju publisku repozitoriju, jo daudzas IT kompānijas prasa līdzīgus uzdevumus. 

## Uzdevumi

Visa sistēma ir balstīta uz PHP (7.1+) un kādu javascript risinājumu (NodeJs, Angular, Vue, React, ...).

Es izvēlējos CodeIgniter 3. Visu šo var izveidot arī ar pliku PHP vai, piem., Symfony vai citu ietvaru. CodeIgniter tika izvēlēts, jo to var uzlikt arī uz "parastā" hostinga. Citur var izmantot Symfony vai Laravel.

Datubāze ir MySQL 5.7, bet der arī kāds NoSQL risinājums. Šoreiz nav tik būtiski. MySQL izvēlējos, jo lielākā daāl hostingu to nodrošina.

Komponentes, kuras nav CodeIgniter pieliku ar Composer.

### Parādīt datus no datubāzes

Parasti jautā pieslēgties datubāzei un iegūt vairākus rezultātus ar vai bez lapotāja (pagination). Cubesystems.lv tāds nebija, bet vajadzēja parādīt jaunākos rakstus no RSS barotnes. Ņemot vērā, ka RSS saites var būt nestabilas, izvēlējos to saturu no sākuma saglabāt datubāzē (arī kā cache) un atrādīt lietotājam, nenoslogojot RSS barotni ar nevajadzīgiem pieprasījumiem.

SimplePie ielasa ziņas datubāzē un parāda to autorizētam lietotājam, ja autorizācija ir ieslēgta.

### Darbs ar Javascript

Ir kompānijas, kuras vēlas lai lapotājs ir bez lapas pārlādes vai lietotāju reģistrācija pārbauda datubāzi vai nav jau šāds lietotājs.

Citos uzdevumos dati jāpievieno un jālabo bez visas lapas pārlādes. Ideja tā pati, tikai citādāks izpildījums.

Lielākā daļa javascript risinājumu šo daļu nodrošina caur AJAX vai citu līdzīgu risinājumu.

## Autorizācija

Ļoti vienkārša. Bet var pielikt arī 2FA, lai uzlabotu drošību katras autentifikācijas un autorizācijas laikā. 

## Koda drošība

Vidēji zema. Jo pieņemu, ka lielu daļu jānodrošina servera līmenī, tādēļ nav liels uzsvars likts uz DDoS vai botu skeneriem.