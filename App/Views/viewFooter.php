<footer>
    <div class="container-fluid mt-5">
        <div class="row mt-5">
            <div class="col-sm-6 mt-5 mb-3 text-center">
                <h3>
                    <a href="?action=accueil">Broc&amp;Landes</a>
                </h3>
                <h3>Nous contacter</h3>
                <p> 21 rue du bois<br>
                    56800 Paimpont</p>
                <p>Email: contact@broceLandes.com</p>
            </div>
            <div class="col-sm-6 mt-3 text-center">
                <h3>Nos réseaux sociaux</h3>
                <ul class="list-inline text-center">
                    <li class="list-inline-item pr-2"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item pr-2"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item pr-2"><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-12 mt-3">
                <ul>
                    <li><a href="?action=mentionsLegales"> Mentions légales</a></li>
                    <li><a href="?action=accueil"> &copy; Broc&amp;Landes 2023.</a></li>
                </ul>
            </div>
            <div class="row text-center my-4 mx-auto">
            <a title="boutton administrateur" href="?action=administration" class="myButton">Administration</a>&nbsp;
            <?php
                if (isset($_SESSION['admin'])) {
                    echo "<a href='?action=deconnexion' class='myButton'>Déconnexion</a>";
                }
             ?>
            </div>
        </div>
    </div>
</footer>
</body>

</html>