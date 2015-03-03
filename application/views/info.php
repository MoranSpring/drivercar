<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>MY Info</title>
        <link rel="stylesheet" type="text/css" href="../mycss.css">
        <link rel="stylesheet" type="text/css" href="../header_menu.css">
        <link rel="stylesheet" type="text/css" href="../css/infocss.css">
        <script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <link href="../tpl/Home/weixin/common/css/wstyle.css" rel="stylesheet" type="text/css" />
    </head>


    <body id="body">
            <div id="header" class="clearfix">
                <div id="head_box">
                    <div id = user class= 'header_content'><a href="http://www.baidu.com">Solemnkyle</a></div>
                    <div id = user class= 'header_content'>|</div>
                    <div id = message class= 'header_content'><a href="http://www.baidu.com">Message</a></div>
                    <div id = register class= 'header_content2'><a href="http://www.baidu.com">Rigister</a></div>
                    <div id = user class= 'header_content2'>|</div>
                    <div id = login class= 'header_content2'><a href="http://www.baidu.com">Login</a></div>
                </div>
            </div>
            <div id="Navigate" class="clearfix">
                <div class="mylogo"><p><img   src="../logo.png" height="50" width="150"/></p></div>
                <div id="nav-menu">
                    <ul class="menu">
                        <li class="stmenu"><h3><a href="qq" class="xialaguang"><span>网站首页</span></a></h3></li>
                        <li class="stmenu">
                            <h3><a href="qq" class="xialaguang"><span>网页教程</span></a></h3>    
                            <ul class="children" style="display: none;">    
                                <li><h3><a href="qq"><span>基础知识</span></a></h3></li>
                                <li><h3><a href="qq"><span>优秀教程</span></a></h3></li>
                                <li><h3><a href="qq"><span>文字效果</span></a></h3></li>
                                <li><h3><a href="qq"><span>按钮制作</span></a></h3></li>
                            </ul>
                        </li>
                        <li class="stmenu">
                            <h3><a href="qq" class="xialaguang"><span>网页特效</span></a></h3>    
                            <ul class="children" style="display: none;">    
                                <li><h3><a href="qq"><span>焦点图</span></a></h3></li>
                                <li><h3><a href="qq"><span>常用代码</span></a></h3></li>
                            </ul>
                        </li>
                        <li class="stmenu">
                            <h3><a href="qq" class="xialaguang"><span>设计教程</span></a></h3>    
                            <ul class="children" style="display: none;">    
                                <li><h3><a href="qq"><span>Photoshop</span></a></h3></li>
                                <li><h3><a href="qq"><span>DreamWeaver</span></a></h3></li>
                                <li><h3><a href="qq"><span>FireWorks</span></a></h3></li>
                                <li><h3><a href="qq"><span>Flash</span></a></h3></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div id = "search" class= 'header_content2' >
                    <form method="get" action="http://www.google.com/search" >
                        Search User Guide&nbsp;
                        <input type="text" class="input" style="width:200px;" name="q" id="q" size="31" maxlength="255" value="" />
                        &nbsp;
                        <input type="submit" class="submit" name="sa" value=" search " />
                    </form>
                </div>
            </div>

        <div id="dao_hang">
            <ul class="lie"><li><h3>biaotiwoshi  </h3>
                    <ul class="children" style="display: none;">
                        <li>nihao</li>
                        <li>nihao</li>
                        <li>nihao</li>
                    </ul>
                </li>
                <li>
                    <h3 >biaotiwoshi  </h3>
                    <ul class="children" style="display: none;">
                        <li>nihao</li>
                        <li>nihao</li>
                        <li>nihao</li>
                    </ul>
                </li>
                <li>
                    <h3>biaotiwoshi  </h3>
                    <ul class="children" style="display: none;">
                        <li>nihao</li>
                        <li>nihao</li>
                        <li>nihao</li>
                    </ul>
                </li>
                <li>
                    <h3>biaotiwoshi  </h3>
                    <ul class="children" style="display: none;">
                        <li>nihao</li>
                        <li>nihao</li>
                        <li>nihao</li>
                    </ul>
                </li></ul>


        </div>
        <div class ="real_content">
            <ul class="tab">
                <li id="one1" class="selected-li" onclick="setTab('one',1,4)">自然</li>
                <li id="one2" onclick="setTab('one',2,4)"><span>生物</span></li>
                <li id="one3" onclick="setTab('one',3,4)">社会</li>
                <li id="one4" onclick="setTab('one',4,4)">思想品德</li>
                
            </ul>
            <div id="main_content">
                <div id="content1">content 1</div>
                <div id="content2" style="display:none">content 2</div>
                <div id="content3" style="display:none">content 3</div>
                <div id="content4" style="display:none">content 4</div>
        </div>
        </div>
        
        


        <div id="footer">Copyright W3School.com.cn</div>
        <script> 

function setTab(name,cursel,n){ 
for(i=1;i<=n;i++){ 
var thismenu=document.getElementById(name+i); 
var con=document.getElementById("content"+i); 
thismenu.className = i==cursel?"selected-li":""; 
con.style.display = i==cursel?"block":"none"; 
} 
} 
//--> 
</script>
        <script type="text/javascript">
            $('#nav-menu .menu > li').hover(function () {
                $(this).find('.children').animate({opacity: 'show', height: 'show'}, 200);
                $(this).find('.xialaguang').addClass('navhover');
            }, function () {
                $('.children').stop(true, true).hide();
                $('.xialaguang').removeClass('navhover');
            });
        </script>


        <script type="text/javascript">
            $('#dao_hang .lie >li').click(function () {
                var crrent = $(this).find('.children').css("display");
                if (crrent == "none") {
                    $(this).find('.children').animate({opacity: 'show', height: 'show'}, 200);
                    $(this).find('.xialaguang').addClass('navhover');
                } else {
                    $('.children').stop(true, true).hide(-200);
                    $('.xialaguang').removeClass('navhover');
                }
            });
        </script>
    </body>


</html>