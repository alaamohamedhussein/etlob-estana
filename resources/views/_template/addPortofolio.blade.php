@include('_include.header') 
<!-- 

<section id="contact">
 Page Content 
        <div class="container">
            
            
                <div class="container toppad" >
               <div class="panel-body">
                   <div class="row">
                <form id="eventForm" method="post" action="/saveOffer" class="form-horizontal">
                   {!! csrf_field() !!}
                    <input type="hidden" name="pid" value="">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">وصف المشروع</label>
                        <div class="col-xs-5">
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-xs-3 control-label">صورة للمشروع</label>
                            <div class="col-xs-5">
                                <input type="file" class="form-control-file" name="portofolioImage">
                
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-default">اضف نموذج لاعمالك</button>
                        </div>
                    </div>
                </form>

               </div>
            </div>
            </div>
         </div>
         /.container 
        </section>-->
<section id="contact">
            <div class="container">
                <div class="row">
                    <div class="container toppad" >
                        <div class="panel panel-info">
                           
                            <div class="panel-body">
                                <div class="row">
                                  <form id="eventForm" enctype="multipart/form-data" method="post" action="/savePortofolio" class="form-horizontal">
                   {!! csrf_field() !!}
<!--                    <input type="hidden" name="pid" value="">-->
                    <div class="form-group">
                     <label class="col-xs-3 control-label">الفئات</label>
                      <div class="col-xs-5">
                    <select class="form-control" name="category" placeholder="الفئة*">
                        @foreach($categories as $category)
                        <option value="{{$category['categoryId']}}">{{$category['categoryName']}}</option>
                        @endforeach
                    </select>
                      </div>
                     </div> 
                   <div class="form-group">
                        <label class="col-xs-3 control-label">وصف المشروع</label>
                        <div class="col-xs-5">
                            <textarea class="form-control noresize" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-xs-3 control-label">صورة للمشروع</label>
                            <div class="col-xs-5">
                                <input type="file" class="form-control-file" name="pImage"/>
                
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-success">اضف نموذج لاعمالك</button>
                        </div>
                    </div>
                </form>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('_include.footer') 
