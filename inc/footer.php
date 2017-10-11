        <br>
        <div class="container-fluid">         
            <div class="row">
                <h3><marquee direction="left">SAP - Secretaria da Administração Penitenciária de São Paulo.</marquee></h3>
            </div>      
        </div> 
        <footer class="container-fluid" id="footer">
            <div class="row text-center">
                <smal id="autor">Desenvolvido por: <a href="#"> Emerson Inácio</a>.</smal>
            </div>   
        </footer>
    </body>
</html>
<?php 
if(isset($_GET["pg"]) && $_GET["pg"] == 15){
    echo'<script>
            $("#toast-login").css("display", "block");
            setTimeout(function(){
                $("#toast-login").fadeOut(3000);
            }, 2000);     
        </script>';
}
?>