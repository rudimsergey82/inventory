   <div class="panel-body">

       @if ($message = Session::get('success'))
           <div class="alert alert-success" role="alert">
               {{ Session::get('success') }}
           </div>
       @endif

       @if ($message = Session::get('error'))
           <div class="alert alert-danger" role="alert">
               {{ Session::get('error') }}
           </div>
       @endif

       <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;">
           <h3>Import, Export file:</h3>
           <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}"
                 class="form-horizontal" method="post" enctype="multipart/form-data">
               <input type="file" name="import_file" >
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <button class="btn btn-success btn-lg">Import File</button>
           </form>
           <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>
           <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success btn-lg">Download CSV</button></a>
       </div>

   </div>