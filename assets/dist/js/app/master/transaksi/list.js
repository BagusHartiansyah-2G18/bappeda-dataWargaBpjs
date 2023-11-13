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
    dom:
      "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        extend: "copy",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6] }
      },
      {
        extend: "print",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6] }
      },
      {
        extend: "excel",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6] }
      },
      {
        extend: "pdf",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6] }
      }
    ],
    oLanguage: {
      sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    responsive:true,
    autoWidth: false,
    ajax: {
      url: base_url + "admin/transaksi/data",
      type: "POST"
    },
    columns: [
      {
        data: "id",
        orderable: false,
        searchable: false
      },
      { data: "nopol" },
      { data: "nama" },
      { data: "alamat" },
      { data: "id_transaksi" },
    ],
    columnDefs: [
      {
        targets: 1,
        orderable: false,
        searchable: false,
        title: "Nomor Polisi",
        data: "nopol",
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
      title: "Nama",
      data: "nama",
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
    title: "Alamat",
    data: "alamat",
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
  title: "No. Transaksi",
  data: "id_transaksi",
  render: function(data, type, row, meta) {            
          return `<div class="text-center">
          ${data}
      </div>`;
  }
},
{
  targets: 0,
  orderable: false,
  searchable: false,
  title: "No",
  data: "id",
  render: function(data, type, row, meta) {            
          return `<div class="text-center">
          ${data}
      </div>`;
  }
},
  ],
    order: [[1, "asc"]],
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

  table
  .buttons()
  .container()
  .appendTo("#data_wrapper .col-md-6:eq(0)");

  

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
          $.getJSON(base_url + "admin/samsat/delete/" + id, function(data) {
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
