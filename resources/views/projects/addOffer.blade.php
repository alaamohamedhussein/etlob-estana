@include('_include.header') 
 

<section>
<!-- Page Content -->
        <div class="container">
            
            <div class="row">
                <?php echo $_POST['pdata']; ?>
                <form id="eventForm" method="post" action="/saveOffer" class="form-horizontal">
                   {!! csrf_field() !!}
                    <input type="hidden" name="pid" value="{{$_POST['pdata']}}">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">السعر</label>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" name="price" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">تاريخ البدء</label>
                        <div class="col-xs-5 date">
                            <div class="input-group input-append date" id="datePicker">
                                <input type="text" class="form-control" name="startDate" />
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">تاريخ الانتهاء</label>
                        <div class="col-xs-5 date">
                            <div class="input-group input-append date" id="datePicker1">
                                <input type="text" class="form-control" name="deadLine" />
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-default">اضف عرض </button>
                        </div>
                    </div>
                </form>


            </div>
         </div>
        <!-- /.container -->
        </section>
@include('_include.footer') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/agency.css" rel="stylesheet">
        <link href="css/blog-post.css" rel="stylesheet">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <!--<link href="css/portfolio-item.css" rel="stylesheet">-->

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Custom MYCSS -->
        <link href="css/myCss.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Include Bootstrap Datepicker -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

        <style type="text/css">
            /**
             * Override feedback icon position
             * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
             */
            #eventForm .form-control-feedback {
                top: 0;
                right: -15px;
            }
        </style>
      
                <script>
                    $(document).ready(function () {
                        $('#datePicker')
                                .datepicker({
                                    format: 'yyyy-mm-dd'
                                })
                                .on('changeDate', function (e) {
                                    // Revalidate the date field
                                    $('#eventForm').formValidation('revalidateField', 'date');
                                });

                        $('#datePicker1')
                                .datepicker({
                                    format: 'yyyy-mm-dd'
                                })
                                .on('changeDate', function (e) {
                                    // Revalidate the date field
                                    $('#eventForm').formValidation('revalidateField', 'date');
                                });

                        $('#eventForm').formValidation({
                            framework: 'bootstrap',
                            icon: {
                                valid: 'glyphicon glyphicon-ok',
                                invalid: 'glyphicon glyphicon-remove',
                                validating: 'glyphicon glyphicon-refresh'
                            },
                            fields: {
                                name: {
                                    validators: {
                                        notEmpty: {
                                            message: 'The name is required'
                                        }
                                    }
                                },
                                date: {
                                    validators: {
                                        notEmpty: {
                                            message: 'The date is required'
                                        },
                                        date: {
                                            format: 'YYYY-MM-DD',
                                            message: 'The date is not a valid'
                                        }
                                    }
                                }
                            }
                        });
                    });
                </script>

