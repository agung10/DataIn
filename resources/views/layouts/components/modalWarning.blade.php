@if(Auth::user()->level != "Administrator")
    @if(Auth::user()->is_complete != 1)
    <!--Modal -->
    <div class="modal fade text-left" id="modalDataDiri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title text-white" id="myModalLabel4">Lengkapi Data Diri Anda!</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        Segera lengkapi data diri anda, klik Lanjut untuk melengkapi.
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('data_diri.edit', Auth::user()->id) }}" class="btn btn-warning ml-1">
                        Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
@endif