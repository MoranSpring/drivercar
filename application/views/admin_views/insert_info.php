<div class="admin-content">

                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>信息插入</small></div>
                </div>
                <div class="am-tabs am-margin" data-am-tabs="{noSwipe: 1}">
                    <ul class="am-tabs-nav am-nav am-nav-tabs">
                        <li class="am-active"><a href="#tab1">新闻上传</a></li>
                        <li><a href="#tab2">驾校添加</a></li>
                        <li><a href="#tab3">图片上传</a></li>
                    </ul>
                    <div class="am-tabs-bd">


                        <div class="am-tab-panel am-fade am-in am-active" id="tab1" style="padding-bottom: 200px">
                            <form class="am-form" action="<?= base_url() . 'index.php/admin/news_upload' ?>" method="post" enctype="multipart/form-data">
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">新闻分类</div>
                                    <div class="am-u-sm-8 am-u-md-10">
                                        <select data-am-selected="{btnSize: 'sm'}" name="news_type">
                                            <option value="1">行业新闻</option>
                                            <option value="2">政策解读</option>
                                            <option value="3">法律法规</option>
                                            <option value="4">学车资讯</option>
                                            <option value="5">学车须知</option>
                                            <option value="6">学车流程</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">显示状态</div>
                                    <div class="am-u-sm-8 am-u-md-10">
                                        <div class="am-btn-group" data-am-button>
                                            <label class="am-btn am-btn-primary am-btn-xs">
                                                <input type="radio" name="options" id="option1"> 正   常
                                            </label>
                                            <label class="am-btn am-btn-primary am-btn-xs">
                                                <input type="radio" name="options" id="option2"> 待审核
                                            </label>
                                            <label class="am-btn am-btn-primary am-btn-xs">
                                                <input type="radio" name="options" id="option3"> 不显示
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">日历组件</div>
                                    <div class="am-u-sm-8 am-u-md-10 ">
                                        <input type="text" class="am-form-field" name="news_date" style="width: 200px" placeholder="日历组件" data-am-datepicker readonly/>
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">文章标题</div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="news_title">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        文章作者
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="news_author">
                                    </div>
                                </div>


                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-22 am-u-md-2 am-text-right admin-form-text">
                                        内容描述
                                    </div>
                                    <div class="am-u-sm-22 am-u-md-10">
                                        <textarea rows="10" placeholder="请使用富文本编辑插件" name="news_content"></textarea>
                                    </div>
                                </div>


                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-22 am-u-md-2 am-text-right admin-form-text">Filename: </div>
                                    <div class="am-u-sm-22 am-u-md-10">
                                        <input type="file" name="file"   id="file" onchange="setImagePreview()"/> 
                                        <div id="localImag"><img id="preview" width=-1 height=-1 style="diplay:none" /></div>
                                    </div>
                                    <br />

                                    <br />
                                </div>
                                <div class="am-margin">
                                    <button type="submit" class="am-btn am-btn-primary am-btn-default">提交保存</button>
                                    <button type="button" class="am-btn am-btn-primary am-btn-default">放弃保存</button>
                                </div>
                            </form>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab2" >
                            <form class="am-form" action="<?= base_url() . 'index.php/admin/school_upload' ?>" method="post" enctype="multipart/form-data">
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        驾校名字
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="jp_name">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        驾校地址
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="jp_addr">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        车辆数
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="jp_car_num">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        倒库数
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="jp_ku_num">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        侧方数
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="jp_ce_num">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        S路数
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="jp_s_num">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        直角路数
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="jp_zhi_num">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        全坡数
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="jp_half_num">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        教练数
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="jp_coach_num">
                                    </div>
                                    <div class="am-hide-sm-only">*必填</div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-22 am-u-md-2 am-text-right admin-form-text">
                                        驾培点简介
                                    </div>
                                    <div class="am-u-sm-22 am-u-md-10">
                                        <textarea rows="10" placeholder="驾培点简介" name="jp_intro"></textarea>
                                    </div>
                                </div>
                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-22 am-u-md-2 am-text-right admin-form-text">Filename: </div>
                                    <div class="am-u-sm-22 am-u-md-10">
                                        <input type="file" name="file"   id="file" onchange="setImagePreview()"/> 
                                        <div id="localImag"><img id="preview" width=-1 height=-1 style="diplay:none" /></div>
                                    </div>
                                    <br />

                                    <br />
                                </div>
                                <div class="am-margin">
                                <button type="submit" class="am-btn am-btn-primary am-btn-default">提交保存</button>
                                <button type="button" class="am-btn am-btn-primary am-btn-default">放弃保存</button>
                                </div>
                            </form>

                        </div>

                        <div class="am-tab-panel am-fade" id="tab3">
                            <form class="am-form" action="<?= base_url() . 'index.php/admin/coach_upload' ?>" method="post" enctype="multipart/form-data">
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        教练姓名
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="coach_name">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        教练工号
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="coach_workid">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        所属驾校
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="coach_sch_id">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        年龄
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="coach_old">
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        教龄
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="coach_car_old">
                                    </div>
                                </div>
                                
                               

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-22 am-u-md-2 am-text-right admin-form-text">
                                        教练简介
                                    </div>
                                    <div class="am-u-sm-22 am-u-md-10">
                                        <textarea rows="10" placeholder="教练简介" name="coach_intro"></textarea>
                                    </div>
                                </div>
                                
                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-22 am-u-md-2 am-text-right admin-form-text">头像</div>
                                    <div class="am-u-sm-22 am-u-md-10">
                                        <input type="file" name="file"   id="file" onchange="setImagePreview()"/> 
                                        <div id="localImag"><img id="preview" width=-1 height=-1 style="diplay:none" /></div>
                                    </div>
                                    <br />

                                    <br />
                                </div>
                                <div class="am-margin">
                                <button type="submit" class="am-btn am-btn-primary am-btn-default">提交保存</button>
                                <button type="button" class="am-btn am-btn-primary am-btn-default">放弃保存</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


            </div>