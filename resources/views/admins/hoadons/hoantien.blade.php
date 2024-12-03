<form action="{{ route('admin.hoadons.refund') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="TransactionType">Loại Hoàn Tiền</label>
        <select class="form-control" id="TransactionType" name="TransactionType" required>
            <option value="02">Hoàn Toàn Phần</option>
            <option value="03">Hoàn Một Phần</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="TxnRef">Mã Tham Chiếu Giao Dịch</label>
        <input type="text" class="form-control" id="TxnRef" name="TxnRef" placeholder="Nhập mã tham chiếu" required>
    </div>
    
    <div class="form-group">
        <label for="Amount">Số Tiền Hoàn (VND)</label>
        <input type="number" class="form-control" id="Amount" name="Amount" placeholder="Nhập số tiền hoàn" required>
    </div>
    
    <div class="form-group">
        <label for="TransactionDate">Ngày Giao Dịch (YmdHis)</label>
        <input type="text" class="form-control" id="TransactionDate" name="TransactionDate" placeholder="20241128" required>
    </div>
    
    <div class="form-group">
        <label for="CreateBy">Người Khởi Tạo</label>
        <input type="text" class="form-control" id="CreateBy" name="CreateBy" placeholder="Nhập tên người khởi tạo" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Gửi Yêu Cầu</button>
</form>
</form>
