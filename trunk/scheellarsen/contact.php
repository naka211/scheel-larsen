<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once('head.php'); ?>
  </head>
  <body>
    <div id="page">
      <?php require_once('header.php'); ?>
      <section class="main mt190">
        <div class="container">
           <div class="main_left clearfix">
            <?php require_once('left_content.php'); ?>
          </div>
          <div class="main_right">
            <div class="template">
              <div class="contact_page">
                <ul class="breadcrumb">
                  <li><a href="index.php">Forside</a></li>
                  <li><a href="contact.php">Kontakt</a></li>
                </ul>
                <h2>Kontakt</h2>
                <div class="w375 fl">
                  <div class="w71 fl mr30 mt10">
                    <img src="img/logo2.png" alt="">
                  </div>
                  <div class="w260 fr">
                    <h4>Scheel-Larsen.dk</h4>
                    <p>Hvis du har spørgsmål eller kommentarer, er du velkommen til at kontakte os pr. tlf. alle ugens dage mellem kl. 11.00 – 16.00, eller sende os en mail via nedenstående formular.</p>
                    <p>Hesselrødvej 26, Karlebo<br>
                    2980 Kokkedal<br>
                    Mobil: 41628001<br>
                    Email: info@scheel-larsen.dk</p>
                    <p><strong>Åbningstider:</strong><br>
                    Mandag-fredag, kl. 10.00-18.00<br>
                    Lørdag, søn- og helligdage, kl. 10-16</p>
                  </div>
                </div>
                <div class="w300 fr">
                  <p>Felter markeret med * skal udfyldes</p>
                  <div class="frm_contact clearfix">
                    <input type="text" placeholder="Navn *">
                    <input type="text" placeholder="Email *">
                    <input type="text" placeholder="Telefon *">
                    <textarea placeholder="Din besked"></textarea>
                    <a class="btn2 btnSend" href="#">Send</a>
                    <a class="btn2 btnNustil" href="#">Nustil</a>
                  </div>
                </div>
                <div class="clear"></div>
                <div class="map clearfix">
                  <a href="#"><img src="img/map.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php require_once('delivery.php'); ?>
      <?php require_once('footer.php'); ?>
    </div>

   <?php require_once('js-footer.php'); ?>
  </body>
</html>