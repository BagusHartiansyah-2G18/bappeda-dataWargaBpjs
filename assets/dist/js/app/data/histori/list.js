var table;

$(document).ready(function() {
  ajaxcsrf();

  table = $("#data").DataTable({
    initComplete: function() {
      var api = this.api();
      $("#kk_filter input")
        .off(".DT")
        .on("keyup.DT", function(e) {
          api.search(this.value).draw();
        });
    },
    oLanguage: {
      sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    responsive:true,
    autoWidth: false,
    ajax: {
      url: base_url + "operator/histori/data",
      type: "POST"
    },
    columns: [
      {
        data: "log_id",
        orderable: false,
        searchable: false
      },
      { data: "log_time" },
      { data: "log_user" },
      { data: "log_tipe" },
      { data: "log_aksi" },
    ],
    columnDefs: [
      {
        targets: 1,
        orderable: false,
        searchable: false,
        title: "Tanggal ",
        data: "log_time",
        render: function(data, type, row, meta) {            
                return `<div class="text-center">
                ${data}
            </div>`;
        }
    },
    {
      targets: 2,
      orderable: false,
      searchable: false,
      title: "Pengguna",
      data: "log_user",
      render: function(data, type, row, meta) {            
              return `<div class="text-center">
              ${data}
          </div>`;
      }
  },
  {
    targets: 3,
    orderable: false,
    searchable: false,
    title: "Modul",
    data: "log_tipe",
    render: function(data, type, row, meta) {            
            return `<div class="text-center">
            ${data}
        </div>`;
    }
},
{
  targets: 4,
  orderable: false,
  searchable: false,
  title: "Aksi",
  data: "log_aksi",
  render: function(data, type, row, meta) {            
          return `<div class="text-center">
          ${data}
      </div>`;
  }
},
  ],
    order: [[0, "asc"]],
    rowId: function(a) {
      return a;
    },
    rowCallback: function(row, data, iDisplayIndex) {
      var info = this.fnPagingInfo();
      var page = info.iPage;
      var length = info.iLength;
      var index = page * length + (iDisplayIndex + 1);
      $("td:eq(0)", row).css( "text-align", "center" ).html(index);
    }
  });

  $(".select_all").on("click", function() {
    if (this.checked) {
      $(".check").each(function() {
        this.checked = true;
        $(".select_all").prop("checked", true);
      });
    } else {
      $(".check").each(function() {
        this.checked = false;
        $(".select_all").prop("checked", false);
      });
    }
  });

  $("#kk tbody").on("click", "tr .check", function() {
    var check = $("#kk tbody tr .check").length;
    var checked = $("#kk tbody tr .check:checked").length;
    if (check === checked) {
      $(".select_all").prop("checked", true);
    } else {
      $(".select_all").prop("checked", false);
    }
  });

  $("#bulk").on("submit", function(e) {
    e.preventDefault();
    e.stopImmediatePropagation();

    $.ajax({
      url: $(this).attr("action"),
      data: $(this).serialize(),
      type: "POST",
      success: function(respon) {
        if (respon.status) {
          Swal({
            title: "Berhasil",
            text: respon.total + " data berhasil dihapus",
            type: "success"
          });
        } else {
          Swal({
            title: "Gagal",
            text: "Tidak ada data yang dipilih",
            type: "error"
          });
        }
        reload_ajax();
      },
      error: function() {
        Swal({
          title: "Gagal",
          text: "Ada data yang sedang digunakan",
          type: "error"
        });
      }
    });
  });

  
});

function hapus(id) {
  Swal({
      title: "Anda yakin?",
      text: "Data akan dihapus.",
      type: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus!"
  }).then(result => {
      if (result.value) {
          $.getJSON(base_url + "operator/transaksi/delete/" + id, function(data) {
              Swal({
                  title: data.status ? "Berhasil" : "Gagal",
                  text: data.status
                      ? "User berhasil dihapus"
                      : "User gagal dihapus",
                  type: data.status ? "success" : "error"
              });
              reload_ajax();
          });
      }
  });
}
