##首頁
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/home1.jpg)

##管理者頁面
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/home2.jpg)

##ERD
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/erd1.jpg)

##資料庫綱要圖
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/erd2.jpg)

##資料表欄位設計
###使用者資料表
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/t1.jpg)
###會員資料表
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/t2.jpg)
###管理者資料表
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/t3.jpg)
###購物車商品資料表
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/t4.jpg)
###訂單資料表
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/t5.jpg)
###商品資料表
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/t6.jpg)
###我的最愛資料表
![image](https://raw.githubusercontent.com/WISD-2021/final02/master/public/img/t7.jpg)

##系統主要功能
###會員
- **會員能以關鍵字或類別查詢票劵**
- **會員將票劵加入購物車、並對購物車票券進行刪除或修改**
- **會員可以查看訂單紀錄**
- **會員可以將票劵加入我的最愛，或對其刪除**
- **會員可在待使用票券頁面使用票券**
###管理者
- **管理者可以查看會員資料、訂單資料、我的最愛資料以及票券資料**
- **管理者可以新增、上下架票券，或對其刪除、修改**

##網站安裝(系統復原步驟)
###1. 複製 https://github.com/WISD-2021/final02.git本系統在GitHub的專案
- ####**打開 Source tree，點選 Clone 後，輸入以下資料Source Path:https://github.com/WISD-2021/final02.git Destination Path:C:\wagon\uwamp\www\final02 打開cmder，切換至專案所在資料夾，cd final02**

###2. 在cmder輸入以下命令，以復原此系統：
- ####**composer install**
- ####**composer run‐script post‐root‐package‐install**
- ####**composer run‐script post‐create‐project‐cmd** 

###3. 將專案打開 在.env檔案內輸入資料庫主機IP、Port、名稱、與帳密如下：：
- ####**DB_HOST=127.0.0.1**
- ####**DB_PORT=33060**
- ####**DB_DATABASE=final02**
- ####**DB_USERNAME=root**
- ####**DB_PASSWORD=root**

###4. 復原完，建立資料庫
- ####**先進Adminer建立final02的資料庫**
- ####**建立好之後開啟cmder輸入以下指令： artisan migrate(成功執行後會復原所有資料表)**
- ####**artisan db:seed(建立假資料)**

###5. 進入adminer
- ####**資料庫系統:MYSQL**
- ####**伺服器:localhost:33060**
- ####**帳號:root**
- ####**密碼:root**

###6. 在UwAmp下，點選Apache config，選擇port 8000 ，並在Document Root 輸入{DOCUMENTPATH}/final02/public

##初始專案與DB負責的同學
####初級專案建置：3A832069  邱琳恩
####資料庫關聯：3A832069  邱琳恩

##系統使用帳號(使用者資料)
####前台-會員 帳號：test2@gmail.com  密碼：87654321
####後台-管理者 帳號：admin@gmail.com 密碼：123456789

##系統開發人員
####3A832069 邱琳恩
####3A832045 陳筠凡

##工作分配
- ###**前台：(3A832069 邱琳恩)**
####首頁
Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home.index');
###商品頁面
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
###商品類別分類功能
Route::get('/product/{type}', [\App\Http\Controllers\ProductController::class, 'searchtype'])->name('product.searchtype');
###商品關鍵字查詢
Route::get('/productname', [\App\Http\Controllers\ProductController::class, 'searchname'])->name('product.searchname');
###購物車頁面
Route::get('/car', [\App\Http\Controllers\CarController::class, 'index'])->name('car.index');
###我的最愛頁面
Route::get('/favor', [\App\Http\Controllers\FavoriteController::class, 'index'])->name('favor.index');
###新增我的最愛
Route::get('/favor/{id}', [\App\Http\Controllers\FavoriteController::class, 'add'])->name('favor.add'); 
###刪除我的最愛
Route::get('/favordelete/{id}', [\App\Http\Controllers\FavoriteController::class, 'delete'])->name('favor.delete');
###新增購物車
Route::get('/car/{id}', [\App\Http\Controllers\CarController::class, 'add'])->name('car.add');
###刪除購物車
Route::get('/cardelete/{id}', [\App\Http\Controllers\CarController::class, 'delete'])->name('car.delete');
###按下訂進入確認訂單頁面
Route::get('/carcheck/{id}', [\App\Http\Controllers\CarController::class, 'check'])->name('car.check');
###購物車變成訂單，原購物車刪除
Route::get('/orderadd/{id}', [\App\Http\Controllers\OrderController::class, 'add'])->name('order.add');
###訂單頁面
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
###訂單使用狀況分類
Route::get('/order/{status}', [\App\Http\Controllers\OrderController::class, 'searchstatus'])->name('order.searchstatus');
###使用票劵
Route::get('/orderuse/{id}', [\App\Http\Controllers\OrderController::class, 'use'])->name('order.use');
- ###**後台：(3A832045 陳筠凡)**
Route::prefix('admin')->group(function () {
###主控台
Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard.index');
###票券管理頁面
Route::get('products', [\App\Http\Controllers\AdminProductController::class, 'index'])->name('admin.products.index');
###新增票券
Route::get('products/create', [\App\Http\Controllers\AdminProductController::class, 'create'])->name('admin.products.create');
###編輯票券
Route::get('products/{id}/edit', [\App\Http\Controllers\AdminProductController::class, 'edit'])->name('admin.products.edit');
###儲存票券
Route::post('products',[\App\Http\Controllers\AdminProductController::class,'store'])->name('admin.products.store');
###更新票券
Route::patch('products/{id}',[\App\Http\Controllers\AdminProductController::class,'update'])->name('admin.products.update');
### 刪除(下架)票券
Route::get('products/{id}',[\App\Http\Controllers\AdminProductController::class,'delete'])->name('admin.products.delete');
###查閱會員我的最愛
Route::get('favorites', [\App\Http\Controllers\AdminFavoriteController::class, 'index'])->name('admin.favorites.index');
###查閱會員訂單
Route::get('orders', [\App\Http\Controllers\AdminOrderController::class, 'index'])->name('admin.orders.index');
###查閱會員訂單
Route::get('members', [\App\Http\Controllers\AdminMemberController::class, 'index'])->name('admin.members.index');
});








