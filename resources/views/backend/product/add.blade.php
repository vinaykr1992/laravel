@extends('layouts.adminapp') @section('content')
<?php 
if(Common::lastId('products')==0 || empty(Common::lastId('products')))
{
    $lastid=1;
}
else
{
    $lastid=Common::lastId('products')+1;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Product Management
            <small>Form Details</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li class="active">Product Management</li>
        </ol>
        @include('include.backend.flash')
    </section>
    <?php //prd(Common::getCategory()) ?>

    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Product Management</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            {{ Form::open(array('name'=>'add-form','id'=>'add-form','method'=>'post','url'=>'/admin/product/add','enctype'=>'multipart/form-data'))}}
            <div class="box-body pad">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">                           
                                {{Form::label('category', 'Select Category',['class'=>'calssName'])}}
                                 {{ Form::select('category_id', ['' => 'Select Category']+Common::getCategory(),null, array('class' => 'form-control','required'=>'required'))
                                }}
    
                            </div>
                        <div class="form-group">
                            {{Form::label('name', 'Product Name',['class'=>'calssName'])}}
                             {{ Form::text('name', null, array('class' => 'form-control','required'=>'required'))
                            }}
                        </div>
                        <div class="form-group">
                            {{Form::label('name', 'Product Price',['class'=>'calssName'])}}
                             {{ Form::text('price', null, array('class' => 'form-control','required'=>'required'))
                            }}
                        </div>
                        <div class="form-group">
                            {{Form::label('name', 'Product Quantity',['class'=>'calssName'])}}
                             {{ Form::text('quantity', null, array('class' => 'form-control','required'=>'required'))
                            }}
                        </div>
                        <div class="form-group">
                            {{Form::label('name', 'Product Weight',['class'=>'calssName'])}}
                             {{ Form::text('weight', null, array('class' => 'form-control','required'=>'required'))
                            }}
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            {{ Form::label('Product slug','Product Slug') }} 
                            {{ Form::text('slug', null, array('class'=>'form-control')) }}
                            <label class="error">{{ $errors->first('slug') }}</label>
                        </div>
                        <div class="form-group">
                            {{ Form::label('short description','Product short description') }} 
                            {{ Form::textarea('short_description',null,['class'=>'form-control','style'=>'height:100px'])
                            }}

                        </div>
                        <div class="form-group">
                            {{ Form::label('Long description','Product Long description') }}
                             {{ Form::textarea('long_description',null,['class'=>'form-control
                            editor']) }}
                        </div>
                        <div class="form-group">
                                {{ Form::label('feature image','Feature Image') }} 
                                {{ Form::file('image','',['class'=>'form-control']) }}
                                <i class="fa fa-file-image"></i>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div>
        </div>
        {{-- for seo meta details --}}
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Seo Management</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-plus"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad" style="display:none;">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{Form::label('meta_title', 'Meta Title',['class'=>'calssName'])}} {{ Form::text('meta_title', '', array('class' => 'form-control'))
                            }}

                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            {{ Form::label('meta_keyword','Meta Keyword') }} {{ Form::textarea('meta_keyword', "", ['class'=>'form-control','style'=>'height:100px'])
                            }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('meta description','Meta description') }} {{ Form::textarea('meta_description','',['class'=>'form-control','style'=>'height:120px;'])
                            }}
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 mtop text-center">
                <button type="submit" name="submit" id="add" class="btn green">
                    <i class="fa fa-check"></i> Submit</button>
                <!--  <button type="submit" name="submit" id="add" class="btn cancel"><i class="fa fa-ban" aria-hidden="true"></i>Cancel</button> -->
            </div>
        </div>
        {{ Form::close() }}
        <!-- /.box -->
        <!-- /.box -->
           <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Homepage Text Details</h3>
                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
                 </div>
               </div>
                   <!-- /.box-header -->
                   <div class="box-body pad">
                       <!-- start here for the multiple upload -->
                       <div class="clearfix">&nbsp;</div>
                           <div class="note note-success">
                               <p>
                                    Drag and drop images here to add gallery images.
                               </p>
                           </div>
                       <form id="fileupload" action="{{SITEURL}}admin/fileupload" method="POST" enctype="multipart/form-data">
                                               <input type="hidden" name="_token" value="xYRfpv3n4n9TFws8fnFqcFE6ToYhkP822giBet4C">
       
                                                               <input type="hidden" name="proj_id" value="<?php echo $lastid; ?>">
                                                               <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                               <div class="row fileupload-buttonbar">
                                                                   <div class="col-lg-7">
                                                                       <!-- The fileinput-button span is used to style the file input field as button -->
                                                                       <span class="btn green fileinput-button" style="margin-right: 0px;">
                                                                       <i class="fa fa-plus"></i>
                                                                       <span>
                                                                       Add files... </span>
                                                                       <input type="file" name="files[]" multiple accept="image/jpg, image/jpeg, image/gif, image/png">
                                                                       </span>
                                                                       <button type="submit" class="btn blue start">
                                                                       <i class="fa fa-upload"></i>
                                                                       <span>
                                                                       Start upload </span>
                                                                       </button>
                                                                       <button type="reset" class="btn warning cancel">
                                                                       <i class="fa fa-ban-circle"></i>
                                                                       <span>
                                                                       Cancel upload </span>
                                                                       </button>
                                                                       <button type="button" class="btn red delete">
                                                                       <i class="fa fa-trash"></i>
                                                                       <span>
                                                                       Delete </span>
                                                                       </button>
                                                                       <input type="checkbox" id="checkaal" class="toggle"><label for="checkaal">Check all</label> 
                                                                       <!-- The global file processing state -->
                                                                       <span class="fileupload-process">
                                                                       </span>
                                                                   </div>
                                                                   <!-- The global progress information -->
                                                                   <div class="col-lg-5 fileupload-progress fade">
                                                                       <!-- The global progress bar -->
                                                                       <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                           <div class="progress-bar progress-bar-success" style="width:0%;">
                                                                           </div>
                                                                       </div>
                                                                       <!-- The extended global progress information -->
                                                                       <div class="progress-extended">
                                                                            &nbsp;
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <!-- The table listing the files available for upload/download -->
                                                               <table role="presentation" class="table table-striped clearfix">
                                                               <tbody class="files">
                                                               </tbody>
                                                               </table>
                                                           </form>
                                                           <div class="panel panel-success">
                                                               <div class="panel-heading">
                                                                   <h3 class="panel-title">Image Upload Notes</h3>
                                                               </div>
                                                               <div class="panel-body">
                                                                   <ul>
                                                                       <li>
                                                                            The maximum file size for uploads is <strong>2 MB</strong>.
                                                                       </li>
                                                                       <li>
                                                                            Only image files (<strong>JPG, JPEG, GIF, PNG</strong>) are allowed.
                                                                       </li>
                                                                   </ul>
                                                               </div>
                                                           </div>
                       <!-- end here for the multiple upload -->
       
                     
                   </div>
           </div>
             <!-- /.box -->
       </section>
         </div>
       
       
       <!-- The blueimp Gallery widget -->
       <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
           <div class="slides">
           </div>
           <h3 class="title"></h3>
           <a class="prev">
           ‹ </a>
           <a class="next">
           › </a>
           <a class="close white">
           </a>
           <a class="play-pause">
           </a>
           <ol class="indicator">
           </ol>
       </div>
       <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
       <script id="template-upload" type="text/x-tmpl">
       {% for (var i=0, file; file=o.files[i]; i++) { %}
           <tr class="template-upload fade">
              <td>
                 <span class="preview"></span>
              </td>
              <td>
                 <p class="name">{%=file.name%}</p>
                 <label class="title">
                   <input type="hidden" name="proj_id[]" value="<?php echo $lastid; ?>">
                   <input type="hidden" name="table[]" class="form-control" value="productsimage">
                   <input name="caption[]" class="form-control" placeholder="Caption">
                 </label>
                 <strong class="error text-danger label label-danger"></strong>
              </td>
              <td>
                 <p class="size">Processing...</p>
                 <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                 <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                 </div>
              </td>
              <td>
                 {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn blue start" disabled>
                       <i class="fa fa-upload"></i>
                       <span>Start</span>
                    </button>
                 {% } %}
                 {% if (!i) { %}
                    <button class="btn red cancel">
                       <i class="fa fa-ban"></i>
                       <span>Cancel</span>
                    </button>
                 {% } %}
              </td>
           </tr>
       {% } %}
       </script>
       <!-- The template to display files available for download -->
       <script id="template-download" type="text/x-tmpl">
              {% for (var i=0, file; file=o.files[i]; i++) { %}
               Hemant
                 <tr class="template-download fade">
                    <td>
                       <span class="preview">
                           {% if (file.thumbnailUrl) { %}
                              <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                           {% } %}
                       </span>
                    </td>
                    <td>
                       <p class="name">
                           {% if (file.url) { %}
                              <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                              <p class="title"><strong>{%=file.caption||''%}</strong></p>
                           {% } else { %}
                              <span>{%=file.name%}</span>
                              <p class="title"><strong>{%=file.caption||''%}</strong></p>
                           {% } %}
                       </p>
                       {% if (file.error) { %}
                           <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                       {% } %}
                    </td>
                    <td>
                       <span class="size">{%=o.formatFileSize(file.size)%}</span>
                    </td>
                    <td>
                       {% if (file.deleteUrl) { %}
                           <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}&table=productsimage"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                              <i class="fa fa-trash-o"></i>
                              <span>Delete</span>
                           </button>
                           <input type="checkbox" name="delete" value="1" class="toggle">
                       {% } else { %}
                           <button class="btn yellow cancel btn-sm">
                              <i class="fa fa-ban"></i>
                              <span>Cancel</span>
                           </button>
                       {% } %}
                    </td>
                 </tr>
              {% } %}
       <script type="javascripts">
           //alert();
       </script>
       <script>
       $(document).ready(function() { 
       $.ajaxSetup(
       {
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
       });
             $('#fileupload').fileupload({
            disableImageResize: false,
            autoUpload: false,
            disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
            maxFileSize: 2000000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},                
           }).on('fileuploadsubmit', function (e, data) {
             data.formData = data.context.find(':input').serializeArray();
         });
         
         // Enable iframe cross-domain access via redirect option:
             $('#fileupload').fileupload(
              'option',
              'redirect',
              window.location.href.replace(
               /\/[^\/]*$/,
               '/cors/result.html?%s'
              )
             );
       
             // Upload server status check for browsers with CORS support:
             if ($.support.cors) {
              $.ajax({
               type: 'HEAD'
              }).fail(function () {
               $('<div class="alert alert-danger"/>')
                   .text('Upload server currently unavailable - ' +
                     new Date())
                   .appendTo('#fileupload');
              });
             }
       
           // Load & display existing files:
           $('#fileupload').addClass('fileupload-processing');
           $.ajax({
            url: $('#fileupload').attr("action"),
            data: {id: <?php echo $lastid; ?>,      
            table: 'productsimage' /* specify table name */ },
            dataType: 'json',
            context: $('#fileupload')[0],
           }).always(function () {
            $(this).removeClass('fileupload-processing');
           }).done(function (result) {
            $(this).fileupload('option', 'done')
            .call(this, $.Event('done'), {result: result});
            console.log(result);
           });
           });
       </script>
       
@endsection