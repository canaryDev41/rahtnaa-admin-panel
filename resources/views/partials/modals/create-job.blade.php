<modal classes="modal-fixed"
       :pivot-x="0"
       :pivot-y="0"
       height="auto"
       name="hello-world">
    <div class="panel panel-default">
        <form action="{{ route('jobs.store') }}" method="post">
        <div class="panel-heading">
            <h4>إضافة وظيفه جديده</h4>
        </div>
        <div class="panel-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">اسم الوظيفه</label>
                    <input required name="name" type="text" class="form-control">
                </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-success">إضافة</button>
        </div>
        </form>
    </div>
</modal>