<script type="text/javascript">
            window.addEventListener('scroll',function(){
                const header = document.querySelector('header');
                header.classList.toggle("sticky",window.scrollY > 0);
            });

            function toggleMenu(){
                const menuToggle = document.querySelector('.menuToggle');
                const navigation = document.querySelector('.navigation');
                menuToggle.classList.toggle('active');
                navigation.classList.toggle('active');
            }

            var x=document.getElementById('login');
            var y=document.getElementById('register');
            var z=document.getElementById('btn');
            
            function register()
            {
                x.style.left='-400px';
                y.style.left='50px';
                z.style.left='110px';
            }
            function login()
            {
                x.style.left='50px';
                y.style.left='450px';
                z.style.left='0px';
            }
                    
            let modal = document.getElementById('login-form');
            let closeBtn = document.querySelector(".close-btn");
            closeBtn.addEventListener('click',function(e){
                modal.style.display = "none";
            });
                    
            
        </script>
 
    </body>
</html>