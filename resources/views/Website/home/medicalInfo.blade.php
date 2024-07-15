@extends('Website/layouts/master')

@section('title')
    website users medical information
@endsection
@push('css')
    {{-- <link rel="stylesheet" href="{{URL::asset('Website/css/custom-style.css')}}" /> --}}
@endpush
@section('sub-header')
    <!-- header -->
    <header>
        <div class="header-area">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-envelope"></i> info@docmed.com</a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-phone"></i> 160160</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <h6>
                                    <a href="{{ route('website.user') }}">Website / </a>
                                    <a href="{{ route('website.user') }}">Users /</a>
                                    <a href="{{ route('website.user') }}">Medical Info</a>
                                </h6>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{ route('website.user') }}">Home</a></li>
                                        <li><a href="{{ route('website.user.medicalinfo') }}">Medical Info</a></li>
                                        <li><a href="{{ route('website.user.contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-lg-block"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
        <!-- Indicators -->
        {{-- <div class="carousel-indicators">
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2"
                aria-label="Slide 3"></button>
        </div> --}}

        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <img src="{{ url('Dashboard/img/pannels/slide1.png') }}" style="height: 500px" class="d-block w-100"
                    alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p class="text-white">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="{{ url('Dashboard/img/pannels/slide2.png') }}" style="height: 500px" class="d-block w-100"
                    alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p class="text-white">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="{{ url('Dashboard/img/pannels/slide3.png') }}" style="height: 500px" class="d-block w-100"
                    alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p class="text-white">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
            <i class="fa-solid fa-arrow-left card p-3 rounded-circle" id="prev"></i>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
            <i class="fa-solid fa-arrow-right card p-3 rounded-circle" id="next"></i>
        </button>
    </div>
    <!-- Carousel wrapper -->
    <div class="container my-5">
        <div class="row col-md-12">
            <div class="col-md-4 px-3">
                <div class="row card mb-3">
                    <form id="searchForm" action="#" method="POST">
                        <div class="input-group p-3">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="fieldName" class="form-control" name="fieldName" />
                                <label class="form-label" for="fieldName">Search For Medical Info</label>
                            </div>
                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="row card mb-3 p-3">Hypertension</div>
                <div class="row card mb-3 p-3">Heart Disease</div>
                <div class="row card mb-3 p-3">Bmi</div>
                <div class="row card mb-3 p-3">Smoking</div>
                <div class="row card mb-3 p-3">Bloud glucose</div>
                <div class="row card mb-3 p-3">HbA1c level</div>

            </div>

            <div class="col-md-8 px-3">
                <div class="row card p-3">
                    <div class="main-image">
                        <img width="100%" src="{{ url('Website/img/home/main.jpg') }}" alt="">
                    </div>
                    <div class="col-md-12 m-1">
                        <br />
                        <a href="" class="text-dark">
                            <h5>What is diabetes?</h5>
                            <hr>
                            <p>
                                The definition of diabetes mellitus is a metabolic disease represented by
                                high blood sugar. Diabetes is caused by a decrease in the secretion of
                                the hormone insulin, or a decrease in the body's ability to use it effectively,
                                which leads to the accumulation of glucose or sugar in the blood.
                                Insulin is a hormone that helps regulate blood sugar,
                                and it helps introduce glucose molecules into cells to be stored or used for
                                energy production. Untreated diabetes causes serious complications,
                                such as damage to nerves, blood vessels, eyes, kidneys, and other body organs.
                            </p>

                        </a>
                    </div>
                    <div class="col-md-12 m-1">
                        <br />
                        <a href="" class="text-dark">
                            <h5>Type one of Diabetes</h5>
                            <hr>
                            <p>
                                Type 1 diabetes is also called childhood diabetes and is an
                                autoimmune disease, that is, the body's immunity attacks and
                                destroys pancreatic cells, leading to a severe decrease in
                                insulin secretion. Type 1 diabetics usually develop the disease
                                in childhood and require insulin daily. Type 1 diabetics make up
                                10% of diabetics. Read also: Diabetes in children
                            </p>

                        </a>
                    </div>
                    <div class="col-md-12 ">
                        <a href="" class="text-dark">
                            <h5>Type tow of Diabetes</h5>
                            <hr>
                            <p>
                                Type 2 diabetes : It is the most common type, and is usually
                                associated with obesity. Type 2 diabetes is caused by the body's
                                resistance to the hormone insulin, and the cells' response to
                                the hormone is disturbed so that glucose builds up in the blood.
                            </p>

                        </a>
                    </div>
                    <div class="col-md-12 ">
                        <a href="" class="text-dark">
                            <h5>Gestational Sugar</h5>
                            <hr>
                            <p>
                                Gestational diabetes is the state of high blood sugar levels
                                during pregnancy only in a pregnant woman, as the placenta
                                secretes hormones that inhibit the work of insulin. Postpartum
                                gestational diabetes recovers spontaneously.
                            </p>

                        </a>
                    </div>
                    <div class="col-md-12 ">
                        <a href="" class="text-dark">
                            <h5>Pre-diabetes</h5>
                            <hr>
                            <p>
                                Prediabetes is a condition in which the level of sugar is higher
                                than normal, but not as high as diabetes. The normal glucose
                                level is between 70-99 mg/dL, and the fasting glucose level in
                                the diabetic patient is higher than 126 mg/dL, and in the case
                                of pre-diabetes the glucose level is between 100-125 mg/dL. A
                                patient with prediabetes is at risk of developing type 2
                                diabetes, but does not have complete diabetes symptoms.
                            </p>
                        </a>
                    </div>
                    <div class="accordion col-md-12 " id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button data-mdb-collapse-init class="accordion-button" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Causes of Diabetes
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    Diabetes is a chronic medical condition characterized by elevated levels of blood sugar
                                    (glucose). There are several factors that can contribute to the development of diabetes,
                                    and the causes can vary depending on the type of diabetes. The main types of diabetes
                                    are Type 1 diabetes, Type 2 diabetes, and gestational diabetes. <br><br>
                                    <strong>Type 1 Diabetes:</strong><br>
                                    Autoimmune Response: Type 1 diabetes is believed to result from an autoimmune reaction
                                    in which the body's immune system mistakenly attacks and destroys the insulin-producing
                                    beta cells in the pancreas. The exact cause of this autoimmune response is not fully
                                    understood, but it may involve genetic and environmental factors. <br><br>
                                    <strong>Type 2 Diabetes:</strong> <br>
                                    Insulin Resistance: The primary factor in Type 2 diabetes is insulin resistance, where
                                    the body's cells do not respond effectively to insulin. Insulin is a hormone that helps
                                    cells absorb glucose from the bloodstream. When cells become resistant to insulin,
                                    glucose levels in the blood rise.
                                    Genetic Factors: Family history and genetics play a role in the development of Type 2
                                    diabetes. If you have a family history of diabetes, you may be at a higher risk.
                                    Lifestyle Factors: Poor diet, lack of physical activity, and obesity are significant
                                    contributors to Type 2 diabetes. Excessive consumption of sugary and processed foods can
                                    contribute to weight gain and insulin resistance.
                                    <br><br><strong>Gestational Diabetes:</strong><br>
                                    Pregnancy-related Hormones: During pregnancy, the placenta produces hormones that can
                                    interfere with the body's ability to use insulin, leading to gestational diabetes. This
                                    condition typically resolves after childbirth, but women who experience gestational
                                    diabetes are at an increased risk of developing Type 2 diabetes later in life.
                                    <br><br><strong></strong><br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Symptoms of Diabetes
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    The symptoms of diabetes can vary depending on the type of diabetes and the stage of its
                                    progression. Here are common symptoms associated with both Type 1 and Type 2 diabetes:
                                    <br><br><strong>Increased Thirst and Urination (Polydipsia and Polyuria)</strong><br>
                                    Excessive thirst (polydipsia) and frequent urination (polyuria) are common symptoms.
                                    Elevated blood sugar levels lead to increased urine production, causing dehydration and
                                    triggering the feeling of excessive thirst.
                                    <br><br><strong>Unexplained Weight Loss:</strong><br>
                                    Despite eating more than usual, individuals with diabetes may experience weight loss.
                                    This is often more noticeable in Type 1 diabetes but can also occur in advanced stages
                                    of Type 2 diabetes.
                                    <br><br><strong>Increased Hunger (Polyphagia): </strong><br>
                                    Individuals with diabetes may experience intense hunger, even after eating.
                                    <br><br><strong>Fatigue:</strong><br>
                                    Persistent fatigue and a feeling of low energy can be a symptom of diabetes, as the
                                    body's cells are not effectively utilizing glucose for energy.
                                    <br><br><strong>Sudden Onset:</strong><br>
                                    Type 1 diabetes often has a rapid onset, and symptoms can develop quickly.

                                    Ketoacidosis: In severe cases of untreated Type 1 diabetes, a condition called diabetic
                                    ketoacidosis (DKA) can occur. Symptoms may include nausea, vomiting, abdominal pain, and
                                    a fruity-smelling breath.

                                    Symptoms Specific to Type 2 Diabetes:

                                    Gradual Onset: Type 2 diabetes typically develops more gradually, and symptoms may be
                                    subtle at first.

                                    Non-Specific Symptoms: Some people with Type 2 diabetes may not experience noticeable
                                    symptoms in the early stages. Diagnosis may occur during routine medical check-ups or
                                    screening tests.
                                    It's important to note that the presence of these symptoms does not necessarily confirm
                                    diabetes, as they can also be associated with other medical conditions. If you suspect
                                    you may have diabetes or experience any of these symptoms, it's crucial to consult with
                                    a healthcare professional for proper evaluation, diagnosis, and management. Early
                                    detection and appropriate treatment are essential for controlling diabetes and
                                    preventing complications.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    How is diabetes diagnosed?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">

                                    Diabetes is typically diagnosed through a combination of blood tests and clinical
                                    assessments. The main tests used to diagnose diabetes and assess blood sugar levels are:
                                    <br><br><strong>Fasting Plasma Glucose (FPG) Test:</strong><br>
                                    Procedure: This test is performed after an overnight fast (usually 8 hours or more). The
                                    individual is asked not to eat or drink anything except water during this fasting
                                    period.
                                    Interpretation: A blood sample is taken, and the fasting plasma glucose level is
                                    measured. If the fasting glucose level is 126 milligrams per deciliter (mg/dL) or higher
                                    on two separate occasions, it may indicate diabetes.
                                    <br><br><strong>Oral Glucose Tolerance Test (OGTT):</strong><br>
                                    Procedure: After an overnight fast, the individual consumes a sugary solution. Blood
                                    samples are taken at intervals (usually 2 hours) to measure how the body processes
                                    glucose.
                                    Interpretation: A 2-hour plasma glucose level of 200 mg/dL or higher during the OGTT may
                                    suggest diabetes. This test is often used to diagnose gestational diabetes during
                                    pregnancy.
                                    <br><br><strong>Hemoglobin A1c Test:</strong><br>
                                    Procedure: This blood test measures the average blood sugar level over the past 2 to 3
                                    months. It does not require fasting.
                                    Interpretation: An A1c level of 6.5% or higher is generally considered indicative of
                                    diabetes. The A1c test is useful for long-term monitoring of blood sugar control.
                                    <br><br><strong>Random Plasma Glucose Test:</strong><br>
                                    Procedure: This test can be done at any time, regardless of when the individual last
                                    ate.
                                    Interpretation: A random plasma glucose level of 200 mg/dL or higher, along with
                                    symptoms of diabetes such as increased thirst and urination, may suggest diabetes.
                                    <br><br><strong>Glycated Albumin (GA) Test:</strong><br>
                                    Procedure: This test measures the percentage of glycated (sugar-bound) albumin in the
                                    blood. It provides information about average blood sugar levels over a shorter time
                                    frame than the A1c test.
                                    Interpretation: Elevated levels of glycated albumin may indicate poorly controlled
                                    diabetes.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Treatment for diabetes
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    The treatment for diabetes depends on the type of diabetes and the individual's specific
                                    circumstances. Here are common approaches for managing both Type 1 and Type 2 diabetes:
                                    <br><br><strong>Lifestyle Modifications:</strong><br>
                                    Diet: A balanced and healthy diet, focusing on portion control, limiting refined
                                    carbohydrates, and including a variety of nutrient-rich foods.
                                    Exercise: Regular physical activity helps improve insulin sensitivity and lowers blood
                                    sugar levels.
                                    <br><br><strong>Oral Medications:</strong><br>
                                    Various oral medications, such as metformin and others, may be prescribed to lower blood
                                    sugar levels. These medications work in different ways, including reducing glucose
                                    production in the liver or improving insulin sensitivity.
                                    <br><br><strong>Injectable Medications:</strong><br>
                                    In some cases, injectable medications like GLP-1 receptor agonists or insulin may be
                                    prescribed.
                                    <br><br><strong>Insulin Therapy (in advanced cases):</strong><br>
                                    For individuals with Type 2 diabetes who cannot manage their blood sugar levels with
                                    oral medications, insulin therapy may be recommended.
                                    <br><br><strong>Regular Monitoring:</strong><br>
                                    Regular monitoring of blood sugar levels helps individuals understand how their
                                    lifestyle choices and medications impact their diabetes management.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFiv">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseFiv" aria-expanded="false"
                                    aria-controls="collapseFiv">
                                    Tips for Living with Diabetes
                                </button>
                            </h2>
                            <div id="collapseFiv" class="accordion-collapse collapse" aria-labelledby="headingFiv"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">

                                    Living with diabetes requires careful management of lifestyle, diet, medications, and
                                    overall health. Here are some tips to help individuals with diabetes lead a healthy and
                                    fulfilling life:
                                    <br><br><strong>Education and Awareness:</strong><br>
                                    Learn about diabetes, its management, and potential complications. Being informed
                                    empowers individuals to make better decisions.
                                    <br><br><strong>
                                        Regular Medical Check-ups:
                                    </strong><br>
                                    Schedule regular check-ups with healthcare professionals to monitor blood sugar levels,
                                    assess overall health, and identify any potential complications early.
                                    <br><br><strong>
                                        Medication Adherence:
                                    </strong><br>
                                    Take medications as prescribed and follow the recommended dosage schedule.
                                    Communicate with healthcare providers if there are concerns about medications or
                                    potential side effects.
                                    <br><br><strong>
                                        Blood Sugar Monitoring:
                                    </strong><br>
                                    Monitor blood sugar levels regularly, especially if you are on insulin therapy or other
                                    medications that require dose adjustments based on glucose readings.
                                    <br><br><strong>
                                        Support System
                                    </strong><br>
                                    Build a strong support system with family, friends, and healthcare professionals.
                                    Having a network of people who understand and support your diabetes management can
                                    be invaluable.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    Diabetes complications
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    Diabetes, if not well-managed, can lead to various complications that affect different
                                    organs and systems in the body. Proper management of blood sugar levels, along with a
                                    healthy lifestyle and regular medical check-ups, can help reduce the risk of these
                                    complications. Here are some common complications associated with diabetes:
                                    <br><br><strong>
                                        Hypoglycemia (Low Blood Sugar):
                                    </strong><br>
                                    Occurs when blood sugar levels drop too low, leading to symptoms such as dizziness,
                                    confusion, shakiness, and, in severe cases, unconsciousness. It is often a side effect
                                    of diabetes medications or insulin therapy.
                                    <br><br><strong>
                                        Hyperglycemia (High Blood Sugar):
                                    </strong><br>
                                    Prolonged high blood sugar levels can lead to symptoms such as excessive thirst,
                                    frequent urination, fatigue, and blurred vision.
                                    <br><br><strong>
                                        Diabetic Ketoacidosis (DKA):
                                    </strong><br>
                                    A severe complication, particularly in Type 1 diabetes, where the body produces high
                                    levels of ketones due to a lack of insulin. DKA can be life-threatening and requires
                                    immediate medical attention.
                                    <br><br><strong>
                                        Hyperosmolar Hyperglycemic State (HHS):
                                    </strong><br>
                                    A serious condition more common in Type 2 diabetes, characterized by extremely high
                                    blood sugar levels and severe dehydration. HHS requires prompt medical intervention.
                                    <br><br><strong>
                                        Cardiovascular Complications:
                                    </strong><br>
                                    Diabetes increases the risk of cardiovascular diseases, including heart disease, stroke,
                                    and peripheral vascular disease. Elevated blood sugar levels contribute to the
                                    development of atherosclerosis (hardening of the arteries).
                                    <br><br><strong>
                                        Neuropathy:
                                    </strong><br>
                                    Long-term elevated blood sugar levels can damage nerves throughout the body, leading to
                                    diabetic neuropathy. This can result in symptoms such as tingling, numbness, pain, and
                                    impaired coordination, particularly in the extremities.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                    What is the course of diabetes?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It
                                    is hidden by default, until the collapse plugin adds the
                                    appropriate classes that we use to style each element. These
                                    classes control the overall appearance, as well as the showing
                                    and hiding via CSS transitions. You can modify any of this
                                    with custom CSS or overriding our default variables. It's also
                                    worth noting that just about any HTML can go within the
                                    <strong>.accordion-body</strong>, though the transition does
                                    limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingAiet">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseAiet" aria-expanded="false"
                                    aria-controls="collapseAiet">
                                    Diabetes related medicines
                                </button>
                            </h2>
                            <div id="collapseAiet" class="accordion-collapse collapse" aria-labelledby="headingAiet"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It
                                    is hidden by default, until the collapse plugin adds the
                                    appropriate classes that we use to style each element. These
                                    classes control the overall appearance, as well as the showing
                                    and hiding via CSS transitions. You can modify any of this
                                    with custom CSS or overriding our default variables. It's also
                                    worth noting that just about any HTML can go within the
                                    <strong>.accordion-body</strong>, though the transition does
                                    limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- search output modal -->
    <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" id="searchResults">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                        data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- <script src="{{ url('Website/js/slider.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $('#searchForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                // Get the field name entered by the user
                var fieldName = $("#fieldName").val();
                // Send AJAX request
                $.ajax({
                    url: '/search/' + fieldName,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Display search results
                        $('#searchResults').html(response.data[0].information);
                        $(".modal-title").html(response.data[0].title);
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    },
                    complete:function(){
                        $("#exampleModal5").modal('show');
                    }
                });
            });
        });
    </script>
@endpush
