$(".nav-link").click(function () {
  var sectionTo = $(this).attr("href");
  $("html, body").animate(
    {
      scrollTop: $(sectionTo).offset().top,
    },
    1000
  );
});
$(".join #bulanLahir").val($(".join #bulanLahir").attr("value"));
$(".join #tahunLahir").val($(".join #tahunLahir").attr("value"));
$(".join #tanggalLahir").val($(".join #tanggalLahir").attr("value"));

$(".editsiswa #bulanLahir").val($(".editsiswa #bulanLahir").attr("value"));
$(".editsiswa #tahunLahir").val($(".editsiswa #tahunLahir").attr("value"));
$(".editsiswa #tanggalLahir").val($(".editsiswa #tanggalLahir").attr("value"));

function previewjoin() {
  const fotojoin = document.querySelector(".join #foto");
  const labelfotojoin = document.querySelector(".join .custom-file-label");
  const previewfotojoin = document.querySelector(".join .img-preview");

  labelfotojoin.textContent = fotojoin.files[0].name; // ini untuk mengambil label dari uploadan
  // untuk mengganti preview
  const filefotojoin = new FileReader();
  filefotojoin.readAsDataURL(fotojoin.files[0]);
  filefotojoin.onload = function (e) {
    previewfotojoin.src = e.target.result;
  };
}

function previeweditsiswa() {
  const fotoeditsiswa = document.querySelector(".editsiswa #foto");
  const labelfotoeditsiswa = document.querySelector(
    ".editsiswa .custom-file-label"
  );
  const previewfotoeditsiswa = document.querySelector(
    ".editsiswa .img-preview"
  );

  labelfotoeditsiswa.textContent = fotoeditsiswa.files[0].name;

  const filefotoeditsiswa = new FileReader();
  filefotoeditsiswa.readAsDataURL(fotoeditsiswa.files[0]);
  filefotoeditsiswa.onload = function (e) {
    previewfotoeditsiswa.src = e.target.result;
  };
}

// untuk guru

$(".tambahguru #bulanLahir").val($(".tambahguru #bulanLahir").attr("value"));
$(".tambahguru #tahunLahir").val($(".tambahguru #tahunLahir").attr("value"));
$(".tambahguru #tanggalLahir").val(
  $(".tambahguru #tanggalLahir").attr("value")
);

$(".editguru #bulanLahir").val($(".editguru #bulanLahir").attr("value"));
$(".editguru #tahunLahir").val($(".editguru #tahunLahir").attr("value"));
$(".editguru #tanggalLahir").val($(".editguru #tanggalLahir").attr("value"));

$(".dashboard-adm #tahunAjaran").val(
  $(".dashboard-adm #tahunAjaran").attr("value")
);

$(".siswaadm #tahunAjaran").val($(".siswaadm #tahunAjaran").attr("value"));

function previewguru() {
  const fototambahguru = document.querySelector(".tambahguru #foto");
  const labelfototambahguru = document.querySelector(
    ".tambahguru .custom-file-label"
  );
  const previewfototambahguru = document.querySelector(
    ".tambahguru .img-preview"
  );

  labelfototambahguru.textContent = fototambahguru.files[0].name; // ini untuk mengambil label dari uploadan
  // untuk mengganti preview
  const filefototambahguru = new FileReader();
  filefototambahguru.readAsDataURL(fototambahguru.files[0]);
  filefototambahguru.onload = function (e) {
    previewfototambahguru.src = e.target.result;
  };
}

function previeweditguru() {
  const fotoeditguru = document.querySelector(".editguru #foto");
  const labelfotoeditguru = document.querySelector(
    ".editguru .custom-file-label"
  );
  const previewfotoeditguru = document.querySelector(".editguru .img-preview");

  labelfotoeditguru.textContent = fotoeditguru.files[0].name;

  const filefotoeditguru = new FileReader();
  filefotoeditguru.readAsDataURL(fotoeditguru.files[0]);
  filefotoeditguru.onload = function (e) {
    previewfotoeditguru.src = e.target.result;
  };
}
