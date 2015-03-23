<html>   
    <head>   
        <meta charset="utf-8">   
    </head>   
    <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/amazeui.min.css"/>
    <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
    <body>   
        <div onselectstart="return false">
            <table class="am-table am-table-bordered ml-table-hover"   style="font-size:8px;cursor:pointer;user-select:none;;">
                <from>
                    <thead>
                        <tr>
                            <th>时   间</th>
                            <th>星期一</th>
                            <th>星期二</th>
                            <th>星期三</th>
                            <th>星期四</th>
                            <th>星期五</th>
                            <th>星期六</th>
                            <th>星期七</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td value="1" name="">08:00--09:00</td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">09:00--10:00</td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">10:00--11:00</td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">11:00--12:00</td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                        </tr>
                        <tr style="background:#DDDDDD;">
                            <td>休息</td><td></td><td></td><td></td><td></td><td></td><td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td value="1" name="">13:00--14:00</td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">14:00--15:00</td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">15:00--16:00</td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">16:00--17:00</td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                        </tr>
                        <tr style="background:#DDDDDD;">
                            <td>休息</td><td></td><td></td><td></td><td></td><td></td><td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td value="1" name="">17:00--18:00</td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                            <td class="item"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">18:00--19:00</td>
                            <td class="item" value="" date="1" num="10"></td>
                            <td class="item" value="" date="2" num="10"></td>
                            <td class="item" value="" date="3" num="10"></td>
                            <td class="item" value="" date="4" num="10"></td>
                            <td class="item" value="" date="5" num="10"></td>
                            <td class="item" value="" date="6" num="10"></td>
                            <td class="item" value="" date="7" num="10"></td>
                        </tr>
                    </tbody>
                </from>
            </table>
            <button class="am-btn" onclick="hs()">summit</button>
        </div>
        <script>
            $(".item").toggle(function () {
                $(this).attr('value', '8');
                $(this).css('background', '#aac');
            }, function () {
                $(this).attr('value', '-1');
                $(this).css('background', '');
            });
            function hs() {
                 var selectedCourse = new Array();;
               $('.item').each(function(){
                    if($(this).attr('value')=='8')
                    {
                        alert($(this).attr('date'));
                    }
                });
               
            }
        </script>
    </body>   
</html> 

