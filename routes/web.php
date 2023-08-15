<?php





use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\admin\truyen_tranh\HinhAnhTruyenController;
use App\Http\Controllers\admin\truyen_tranh\TruyenController;
use App\Http\Controllers\admin\truyen_tranh\TapTruyenController;
use App\Http\Controllers\admin\tieu_thuyet\ChuongtieuthuyetController;
use App\Http\Controllers\admin\tieu_thuyet\TieuthuyetController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
    // Route::get('/admin/statistics',[AdminController::class, 'statistics'])->name('admin.statistics')->middleware('admin');
    //TruyenController
    Route::get('/admin/truyen-tranh/danh-sach-truyen-tranh', [TruyenController::class, 'danhSachTruyenTranh'])->name('admin.truyen-tranh.danh-sach-truyen-tranh');
    Route::get('/admin/truyen-tranh/danh-sach-truyen-tranh/create', [TruyenController::class, 'truyenTranhCreate'])->name('admin.truyen-tranh.danh-sach-truyen-tranh.create');
    Route::post('/admin/truyen-tranh/danh-sach-truyen-tranh/create', [TruyenController::class, 'create'])->name('admin.truyen-tranh.danh-sach-truyen-tranh.create');

    Route::get('/admin/truyen-tranh/danh-sach-truyen-tranh/update/{truyen_id}', [TruyenController::class, 'truyenTranhUpdate'])->name('admin.truyen-tranh.danh-sach-truyen-tranh.update');
    Route::post('/admin/truyen-tranh/danh-sach-truyen-tranh/update/{truyen_id}', [TruyenController::class, 'update'])->name('admin.truyen-tranh.danh-sach-truyen-tranh.update');

    Route::delete('/admin/truyen-tranh/danh-sach-truyen-tranh/delete/{truyen_id}', [TruyenController::class, 'delete'])->name('admin.truyen-tranh.danh-sach-truyen-tranh.delete');
    //TapTruyenController
    Route::get('/admin/tap-truyen-tranh/danh-sach-tap-truyen-tranh', [TapTruyenController::class, 'danhSachTapTruyenTranh'])->name('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh');
    Route::get('/admin/tap-truyen-tranh/danh-sach-tap-truyen-tranh/create', [TapTruyenController::class, 'tapTruyenTranhCreate'])->name('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.create');
    Route::post('/admin/tap-truyen-tranh/danh-sach-tap-truyen-tranh/create', [TapTruyenController::class, 'create'])->name('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.create');

    Route::get('/admin/tap-truyen-tranh/danh-sach-tap-truyen-tranh/update/{chuong_id}', [TapTruyenController::class, 'tapTruyenTranhUpdate'])->name('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.update');
    Route::post('/admin/tap-truyen-tranh/danh-sach-tap-truyen-tranh/update/{chuong_id}', [TapTruyenController::class, 'update'])->name('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.update');

    Route::delete('/admin/tap-truyen-tranh/danh-sach-tap-truyen-tranh/delete/{chuong_id}', [TapTruyenController::class, 'delete'])->name('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.delete');
    //HinhAnhTruyenController
    Route::get('/admin/tap-truyen-tranh/danh-sach-hinh-anh-truyen/{chuong_id}/{chuong_ten}/{ten_truyen}', [HinhAnhTruyenController::class, 'danhSachHinhAnhTruyen'])->name('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen');
    Route::get('/admin/danh-sach-hinh-anh-truyen/create/{chuong_id}/{chuong_ten}', [HinhAnhTruyenController::class, 'HinhAnhTruyenCreate'])->name('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen.create');
    Route::post('/admin/danh-sach-hinh-anh-truyen/create/{chuong_id}/{chuong_ten}', [HinhAnhTruyenController::class, 'create'])->name('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen.create');
    Route::post('/upload/images', [HinhAnhTruyenController::class, 'uploadimg'])->name('upload.images');

    Route::get('/admin/danh-sach-hinh-anh-truyen/update/{chuong_hinhanh_id}/{chuong_ten}', [HinhAnhTruyenController::class, 'HinhAnhTruyenUpdate'])->name('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen.update');
    Route::post('/admin/danh-sach-hinh-anh-truyen/update/{chuong_hinhanh_id}/{chuong_ten}', [HinhAnhTruyenController::class, 'update'])->name('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen.update');

    Route::delete('/admin/danh-sach-hinh-anh-truyen/delete/{chuong_hinhanh_id}/{chuong_id}/{chuong_ten}/{ten_truyen}', [HinhAnhTruyenController::class, 'delete'])->name('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen.delete');

    //TieuThuyetController
    Route::get('/admin/tieu-thuyet/danh-sach-tieu-thuyet', [TieuthuyetController::class, 'danhSachTieuThuyet'])->name('admin.tieu-thuyet.danh-sach-tieu-thuyet');
    Route::get('/admin/tieu-thuyet/danh-sach-tieu-thuyet/create', [TieuthuyetController::class, 'tieuThuyetCreate'])->name('admin.tieu-thuyet.danh-sach-tieu-thuyet.create');
    Route::post('/admin/tieu-thuyet/danh-sach-tieu-thuyet/create', [TieuthuyetController::class, 'create'])->name('admin.tieu-thuyet.danh-sach-tieu-thuyet.create');

    Route::get('/admin/tieu-thuyet/danh-sach-tieu-thuyet/update/{truyen_id}', [TieuthuyetController::class, 'tieuThuyetUpdate'])->name('admin.tieu-thuyet.danh-sach-tieu-thuyet.update');
    Route::post('/admin/tieu-thuyet/danh-sach-tieu-thuyet/update/{truyen_id}', [TieuthuyetController::class, 'update'])->name('admin.tieu-thuyet.danh-sach-tieu-thuyet.update');

    Route::delete('/admin/tieu-thuyet/danh-sach-tieu-thuyet/delete/{truyen_id}', [TieuthuyetController::class, 'delete'])->name('admin.tieu-thuyet.danh-sach-tieu-thuyet.delete');

    //ChuongTieuThuyetController
    Route::get('/admin/chuong-tieu-thuyet/danh-sach-chuong-tieu-thuyet', [ChuongtieuthuyetController::class, 'danhSachChuongTieuThuyet'])->name('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet');
    Route::get('/admin/chuong-tieu-thuyet/danh-sach-chuong-tieu-thuyet/create', [ChuongTieuthuyetController::class, 'chuongTieuThuyetCreate'])->name('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet.create');
    Route::post('/admin/chuong-tieu-thuyet/danh-sach-chuong-tieu-thuyet/create', [ChuongTieuthuyetController::class, 'create'])->name('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet.create');

    Route::get('/admin/chuong-tieu-thuyet/danh-sach-chuong-tieu-thuyet/update/{chuong_id}', [ChuongTieuthuyetController::class, 'chuongTieuThuyetUpdate'])->name('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet.update');
    Route::post('/admin/chuong-tieu-thuyet/danh-sach-chuong-tieu-thuyet/update/{chuong_id}', [ChuongTieuthuyetController::class, 'update'])->name('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet.update');

    Route::delete('/admin/chuong-tieu-thuyet/danh-sach-chuong-tieu-thuyet/delete/{chuong_id}', [ChuongTieuthuyetController::class, 'delete'])->name('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet.delete');
});



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/truyen-tranh/{truyen_id}', [DetailController::class, 'showTruyenTranh'])->name('truyen-tranh.show');
Route::get('/truyen-tranh', [DetailController::class, 'showCateTruyenTranh'])->name('Catetruyen-tranh.show');

Route::get('/tieu-thuyet/{truyen_id}', [DetailController::class, 'showTieuThuyet'])->name('tieu-thuyet.show');
Route::get('/tieu-thuyet', [DetailController::class, 'showCateTieuThuyet'])->name('Catetieu-thuyet.show');



Route::get('/truyen-tranh/{truyen_id}/{chuong_so}/{tong_chuong}', [ContentController::class, 'showNoiDungTruyenTranh'])->name('noi-dung.show');
Route::get('/tieu-thuyet/{truyen_id}/{chuong_so}/{tong_chuong}', [ContentController::class, 'showNoiDungTieuThuyet'])->name('noi-dung.show');


route::get('admin/login', function () {
    return view('admin.login');
});
Route::post('/admin/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/logout', [HomeController::class, 'logout'])->name('user.logout');



