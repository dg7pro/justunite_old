<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Login or Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{--<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>--}}
                <p class="text-default"><b>Not a member yet! It just takes 30 sec... to Register, please register to join the movement.
                        If already a member! please login to continue...</b></p>
                <br>
                <div class="text-center">
                    <a href="{{ url('loginToContinue') }}" class="btn btn-success">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                    @php
                        Session(['lastUrl' => Request::fullUrl()])
                    @endphp
                </div>
            </div>
            {{--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>--}}
        </div>
    </div>
</div>