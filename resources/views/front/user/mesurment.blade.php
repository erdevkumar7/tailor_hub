@extends('front.layouts.layout') @section('content')

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Measurement</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard">
    @include('front.user.sidebar')

    <div class="col-md-9">
        <div class="mesurment-layout">
            <div class="container">
                <div class="row mesurment-body">
                    <div class="col-md-6 mesurment-body-left">
                        <img src="{{ url('/public') }}/front_assets/images/working-new-dress.png" />
                    </div>

                    <div class="col-md-6 mesurment-body-right">
                        <!--p-- class="read-inner-text">October 11, 2024 . 5 min read</!--p-->
                        <h1>How to use a body measurement for tailoring, fitness progress, and wellness tracking</h1>
                        <h6>Why track body changes with a measurement chart? To gain insights for tailoring, fitness, or wellness. Get expert tips for success.</h6>
                    </div>
                </div>

                <div class="row mesurment-inner-layout">
                    <div class="col-md-12 mesurment-left">
                        <img src="{{ url('/public') }}/front_assets/images/measurement-img.png" />
                    </div>
                    <div class="col-md-12 mesurment-right">
                        <form class="measurement-form" id="measurment_form" action="{{url('mesurment')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <h1 class="title">Tailor Measurement</h1>
                            <p class="ensure-inner-text">Provide your measurements to ensure the perfect fit.</p>
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label for="measurment_title">Measurment Title</label>
                                    <input type="text" id="measurment_title" name="measurment_title" placeholder="Enter Title" value="{{ $measur ? $measur->measurment_title : '' }}" required />
                                    <input type="hidden" name="id" value="{{ $measur ? $measur->id : '' }}"/>
                                </div>
                            </div>    
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label for="full_soulder">Full Soulder (cm)</label>
                                    <input type="number" id="full_soulder" name="full_soulder" placeholder="Enter full soulder" value="{{ $measur ? $measur->full_soulder : '' }}" min="0" step="0.1" required />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="full_sleeves">Full Sleeves (cm)</label>
                                    <input type="number" id="full_sleeves" name="full_sleeves" placeholder="Enter full sleeves" value="{{ $measur ? $measur->full_sleeves : '' }}" min="0" step="0.1" required />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="full_chest">Full Chest (cm):</label>
                                    <input type="number" id="full_chest" name="full_chest" placeholder="Enter width in cm" value="{{ $measur ? $measur->full_chest : '' }}" min="0" max="70" step="0.1" required />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label for="waist_stomach">Waist Stomach (cm) </label>
                                    <input type="number" id="waist_stomach" name="waist_stomach" placeholder="Enter waist stomach" value="{{ $measur ? $measur->waist_stomach : '' }}" min="0" step="0.1" required />
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="hips">hips (cm)</label>
                                    <input type="number" id="hips" name="hips" placeholder="Enter hips" value="{{ $measur ? $measur->hips : '' }}" min="0" step="0.1" required />
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="front-chest">Front Chest (cm)</label>
                                    <input type="number" id="front-chest" name="front_chest" placeholder="Enter front chest" value="{{ $measur ? $measur->front_chest : '' }}" min="0" step="0.1" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label for="back-chest-length">Back Chest Length (cm)</label>
                                    <input type="number" id="back-chest-length" name="back_chest_length" placeholder="Enter back chest length" value="{{ $measur ? $measur->back_chest_length : '' }}" min="0" step="0.1" required />
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="jacket-size">Jacket Size (cm)</label>
                                    <input type="number" id="jacket-size" name="jacket" placeholder="Enter jacket size" value="{{ $measur ? $measur->jacket : '' }}" min="0" step="0.1" required />
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="pant-waist">Pant Waist Size (cm):</label>
                                    <input type="number" id="pant-waist" name="pant_waist" placeholder="Enter waist size" value="{{ $measur ? $measur->pant_waist : '' }}" min="0" step="0.1" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label for="low-hip">Low Hip Size (cm):</label>
                                    <input type="number" id="low-hip" name="low_hip_pant" placeholder="Enter low hip size" value="{{ $measur ? $measur->low_hip_pant : '' }}" min="0" step="0.1" required />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="thigh">Thigh Measurement (cm):</label>
                                    <input type="number" id="thigh" name="thigh" placeholder="Enter thigh" value="{{ $measur ? $measur->thigh : '' }}" min="0" step="0.1" required />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="full-crotch">Full Crotch (cm):</label>
                                    <input type="number" id="full-crotch" name="full_crotch" placeholder="Enter full crotch" value="{{ $measur ? $measur->full_crotch : '' }}" min="0" step="0.1" required />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label for="pant-length">Pant Length (cm):</label>
                                    <input type="number" id="pant-length" name="pant_length" placeholder="Enter pant length" value="{{ $measur ? $measur->pant_length : '' }}" min="0" step="0.1" required />
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="bicep-arms">Bicep Arm (cm):</label>
                                    <input type="number" id="bicep-arms" name="bicep_arms" placeholder="Enter bicep arm" value="{{ $measur ? $measur->bicep_arms : '' }}" min="0" step="0.1" required />
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="neck">Neck Measurement (cm):</label>
                                    <input type="number" id="neck" name="neck" placeholder="Enter neck" value="{{ $measur ? $measur->neck : '' }}" min="0" step="0.1" required />
                                </div>
                            </div>
                            <div class="form-row">
                            <button type="submit" class=" submit btn btn-outline-success">Submit</button>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
            </div>

            <!--div-- class="row measurement-sheet">
                <h1>Tailor Measurement Data</h1>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Measurement Type</th>
                            <th>Measurement (in inches)</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Chest</td>
                            <td>40</td>
                            <td>Fitted</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Waist</td>
                            <td>34</td>
                            <td>Comfortable Fit</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Hips</td>
                            <td>38</td>
                            <td>Slim Fit</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Neck</td>
                            <td>15</td>
                            <td>Regular</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Sleeve Length</td>
                            <td>25</td>
                            <td>Long</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Shoulder</td>
                            <td>18</td>
                            <td>Square Fit</td>
                        </tr>
                    </tbody>
                </table>
            </!--div-->
        </div>
    </div>
</div>


@endsection
