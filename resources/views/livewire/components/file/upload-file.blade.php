<div>
    {{-- The Master doesn't talk, he acts. --}}
    <!-- The Modal -->
    <div class="modal fade" id="myModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content modal_content_css " id="modal-content2">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader">
                    رفع
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label>Name:</label> -->
                            @if (!$polling)
                                <input type="file" class="form-control-file border" id="file" wire:model="file"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    style="height: 30px; margin-top:8px">
                            @else
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated @if ($status == 'success') bg-success @elseif($status == 'error') bg-danger @elseif($status == 'warning') bg-warning @endif"
                                        role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{ $progress }}%;">%{{ $progress }}</div>

                                </div>
                                <center>
                                    <span class="text-{{ $status }}">
                                        {{ $status }}
                                    </span>
                                </center>
                            @endif
                            {{-- @if ($this->getWarning())
                                <br>
                                <a href="#" class="btn btn-warning btn-sm" target="_blank">عرض سجل العملية</a>
                            @endif --}}
                        </div>
                        <!-- <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal"
                        wire:click.prevent="saveFile" wire:loading.attr="disabled" id="">حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal"
                        id="">إلغاء</button>
                </div>
            </div>
        </div>
    </div>
</div>
