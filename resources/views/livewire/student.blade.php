<div>
    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step col-xs-3">
                    <a type="button" class="btn btn-circle {{ $step >=1 ? 'btn-active' : '' }}" wire:click="changeStep(1)">1</a>
                    <p><small>Basic Info</small></p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a type="button" class="btn btn-circle {{ $step >=2 ? 'btn-active' : '' }}" wire:click="changeStep(2)">2</a>
                    <p><small>Photo</small></p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a type="button" class="btn btn-circle {{ $step >=3 ? 'btn-active' : '' }}" wire:click="changeStep(3)">3</a>
                    <p><small>Address</small></p>
                </div>
            </div>
        </div>

        <form role="form">

            @if($step === 1)
                <div class="panel panel-primary setup-content" id="basicInfo">
                    <div class="panel-heading">
                        <h3 class="panel-title">Basic Info:</h3>
                    </div>
                    <div class="panel-body pt-2">
                        <div class="form-group mb-4">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" wire:model="name">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" wire:model="email">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-md-flex justify-content-md-end">
                            <button class="btn btn-success" type="button" wire:click="nextStep">Next</button>
                        </div>
                    </div>
                </div>
            @endif

            @if($step === 2)
                <div class="panel panel-primary setup-content" id="basicInfo">
                    <div class="panel-heading">
                        <h3 class="panel-title">Photo:</h3>
                    </div>
                    <div class="panel-body pt-2">

                        <div class="form-group mb-3">
                            <label for="photo">Photo</label>
                            <input type="file" id="photo" class="form-control" wire:model="photo">
                            @error('photo')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-center">
                            @if($photo)
                                <img src="{{ $photo->temporaryUrl() }}" alt="" class="img-thumbnail" width="100" class="mb-4">
                            @endif
                        </div>

                        <div class="d-md-flex justify-content-md-end">
                            <button class="btn btn-warning" type="button" wire:click="previousStep">Previous</button> &nbsp; &nbsp;
                            <button class="btn btn-success" type="button" wire:click="nextStep">Next</button>
                        </div>
                    </div>
                </div>
            @endif

            @if($step === 3)
                <div class="panel panel-primary setup-content" id="basicInfo">
                    <div class="panel-heading">
                        <h3 class="panel-title">Address Info:</h3>
                    </div>
                    <div class="panel-body pt-2">
                        <div class="form-group mb-4">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" wire:model="address">
                            @error('address')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="city">City</label>
                            <input type="text" id="city" class="form-control" wire:model="city">
                            @error('city')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-md-flex justify-content-md-end">
                            <button class="btn btn-warning" type="button" wire:click="previousStep">Previous</button> &nbsp; &nbsp;
                            <button class="btn btn-success" type="button" wire:click="store">Submit</button>
                        </div>
                    </div>
                </div>
            @endif

        </form>
    </div>
</div>
