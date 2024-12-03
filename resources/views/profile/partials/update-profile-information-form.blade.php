<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>User Profile</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="profile-set">
                    <div class="profile-head">
                    </div>
                    <div class="profile-top">
                        <div class="profile-content">
                            <div class="profile-contentimg">
                                <img src="{{ asset('assets/img/customer/customer5.jpg') }}" alt="img" id="blah">
                                <div class="profileupload">
                                    <input type="file" id="imgInp" class="d-none">
                                    <a href="javascript:void(0);" onclick="document.getElementById('imgInp').click();">
                                        <img src="{{ asset('assets/img/icons/edit-set.svg') }}" alt="img">
                                    </a>
                                </div>
                            </div>
                            <div class="profile-contentname">
                                <h2>{{ $user->name ?? 'William Castillo' }}</h2>
                                <h4>Update Your Photo and Personal Details.</h4>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <button class="btn btn-cancel">Save</button>
                        </div>
                    </div>
                </div>

                <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Fullname</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="William" value="{{ old('name', $user->name) }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="shop_name">Shop Name</label>
                                <input type="text" name="shop_name" id="shop_name" class="form-control" placeholder="Castilo" value="{{ old('shop_name', $user->shop_name) }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="william@example.com" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="+1452 876 5432" value="{{ old('phone', $user->phone) }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="college">Department</label>
                                <select name="college" id="college" class="form-control">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->department_name }}" {{ old('college', $user->college) == $department->department_name ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <select name="address" id="address" class="form-control">
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->section_name }}" {{ old('address', $user->address) == $section->section_name ? 'selected' : '' }}>
                                            {{ $section->section_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" id="password" class="form-control pass-input">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control pass-input">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <button type="reset" class="btn btn-cancel">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
