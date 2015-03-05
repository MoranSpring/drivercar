       



<div id="footer">Copyright © 虎嗅网 （京ICP备12013432)</div>

<script>
            function setTab(name, cursel, n) {
                for (i = 1; i <= n; i++) {
                    var thismenu = document.getElementById(name + i);
                    var con = document.getElementById("content" + i);
                    thismenu.className = i == cursel ? "selected-li" : "";
                    con.style.display = i == cursel ? "block" : "none";
                }
            }
        </script>


        <script type="text/javascript">
            $('#menu-ul >li').hover(function () {
                $(this).find('.menu-chir').animate({opacity: 'show', height: 'show'}, 200);
            }, function () {
                $('.menu-chir').stop(true, true).hide();
            });
        </script>
</body>
</html>
