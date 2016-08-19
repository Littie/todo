<div class="container show">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">.
            <h2>Task now</h2>
            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $task->name }}</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <h4>{{ $task->due_date }}</h4>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    {{ $task->note }}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>

