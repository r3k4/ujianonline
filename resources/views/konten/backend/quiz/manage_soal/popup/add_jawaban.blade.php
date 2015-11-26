<h4>
	Tambah Jawaban Soal
</h4>
<hr>



<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
    	<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
    		<i class='fa fa-plus-square'></i> Add Jawaban Soal
    	</a>
    </li>
    <li role="presentation">
    	<a href="#list_data_jawaban" aria-controls="list_data_jawaban" role="tab" data-toggle="tab">
    		<i class='fa fa-th-list'></i> Daftar Jawaban Soal
    	</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
	    @include($base_view.'manage_soal.popup.add_jawaban.form_add_jawaban')
    </div>
    <div role="tabpanel" class="tab-pane fade" id="list_data_jawaban">
	    @include($base_view.'manage_soal.popup.add_jawaban.list_data_jawaban')
    </div>
  </div>

</div>





