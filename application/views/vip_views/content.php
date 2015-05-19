
<li class="cls">
    <p class="date" onload="set_date()"><?=$date?>
    </p>
    <p class="intro">
        <span class="am-badge am-badge-primary am-text-xl" ><?= $course ?></span>
    </p>
    <p class="version">
        已通过
    </p>
    <div class="more"><br/>
        <table class="am-table am-table-bordered ml-red">
            <tbody>
                <tr>
                    <td>内容 </td>
                    <td>倒库</td>
                </tr>
                <tr>
                    <td>节数</td>
                    <td>第<?= $course_num ?>节课</td>
                </tr>

                <tr class="am-active">
                    <td>教练</td>
                    <td><ul id="coach" class="clearfix">
                            <li style="float:left;">
                                <img class="am-img-thumbnail am-circle" src="<?= $imageURL ?>" width="70" height="70"/>
                            </li>
                            <li style="float:left;">
                                <ul>
                                    <li>
                                        <?= $Name ?>
                                    </li>
                                    <li>
                                        教练等级：<span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star-half-o ml-red"></span>
                                    </li>
                                </ul>
                            </li>
                        </ul></td>
                </tr>
                <tr>
                    <td>地点</td>
                    <td><?= $school ?></td>
                </tr>
                <tr>
                    <td>积分消费</td>
                    <td>100RMB</td>
                </tr>
                <tr>
                    <td>已学学时</td>
                    <td>1课时</td>
                </tr>
                <tr>
                    <td>教学建议</td>
                    <td><?=$book_suggest?></td>
                </tr>
            </tbody>
        </table>
    </div>
</li>