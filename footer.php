</section>
<footer>
    <div id="copyright">
        <p class="texto">&copy; Copyright</p>
    </div>
</footer>
</div>
<script type="text/javascript">
function toggle_registro() {
    var registro = document.getElementById('registro');
    var login = document.getElementById('loguearse');
    var boton_registro = document.getElementById('register');
    var boton_login = document.getElementById('login');

    registro.style.display = 'flex';
    login.style.display = 'none';
    boton_registro.style.background = '#D64D4D';
    boton_login.style.background = 'none';
}
function toggle_login() {
    var registro = document.getElementById('registro');
    var login = document.getElementById('loguearse');
    var boton_registro = document.getElementById('register');
    var boton_login = document.getElementById('login');

    registro.style.display = 'none';
    login.style.display = 'flex';
    boton_registro.style.background = 'none';
    boton_login.style.background = '#D64D4D';
}
</script>
</body>
</html>
