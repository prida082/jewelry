@extends('layouts.app')

@section('content')

<body class="bg-success p-2 text-dark bg-opacity-25">
    <div class="container">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="https://lh3.googleusercontent.com/r8I8BnoMPpDnDKhURdL3J4vVl_R_JYkZFNlTHWnhT0jroQN9sHsjmqlK2Gy6zrLndizAoqxCng8uzghojEMyg5Ex-atnpkXwipQcNIpy2YwXIONC0-JqF0urCpJqVLW9CxPl1e1iK1KgS1v4I71D92pns93T2gCbTxlQJLlZ-uDRfk8H3m0y_5GzcPWQNjaGmgXC3zfoyCJs9ruGjD7yCj-O9FiaS0sG8QkGONdXAYyu8APwS_pN0ieUnU7HfPKcFwE_6MEvk5duxH5XHa1z-9MOGuS5fBrnG75w9LZ7TEmCJeJPYm7V73VqH8Fux16sqZNTyriuEH-K0gLnQRyPIBKEIWiS1IIpPUTw6ye0sVUPOB1r-dKFWjdklihtAKPlsE0iMa6gVZVgV9IOJW85bs-0h7mFxWLeWwQ4WpZebRp6peDa-Wq_hLuCCMw1KmbXu6G4c6R-umV7-AIzhvFsZGRmWz7NbFfTh14cU403o5M19UIjzn52H1tCKAe_6-tNEkUcrxfTorLPo4-TKOKaoLvoqWbE5OJS96AkXQxVUtZXMbXI83f2uT2CQCk2RXm92kpnFvQ4tzhgnBS6T3NRabUqwaqX2UhB8InVxIAjvG-3zQmkztY7MOP7631Ln1oIkdjzOeeqMUR4s8xRrRYdDMNERVoCpKo5FVHcWC7yqFKPopuxwCOwWbUcYwzi3ESeg7o_V_hlaG0ZjkFPcPjX0GGv=w1453-h953-no?authuser=0" class="d-block w-50 mx-auto" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://lh3.googleusercontent.com/WyGZOhI7O2pbWk_tWw9SkFXzsH2lksfGk-msiDzDGRB_RNy_e90uylmHm3jOlCQ6rpJyGmd_NovEdRncElywRX_7Rpb0RoaDy8Cu7lzEEPDC__Omzd7GGKcKEf0A7gqOMjK4FzDlnl-wvzEDLiIqsD9Z0dJx-ROj20ELie1vDiizDKEYfE96bx6b94oMRIjHOrWJSFCxch2cKyfTyTR2DxAIYkqzRBxzF6bNRGmo_st_xiHXLydic7YNJez6lj57lDkc_jLiU1Po8bzPjYPLduWaIfQmvSHsN74fCom8x5x8Qkjk9K3356krEK6V_WTNLsJjYlAH5fIgVgsNy1pjpzLunBHh4oVOyl_PtWlScF1gsDdA_r4UMhGemYYxI8zbtZWYI6ZU9pNcvCbCl25mm2eYw9Qdxxl5QdNr3fZA0e8hSHqYU4TG5mR4NjQlbpCff7sn9mUKUBjnmqNl5daT1J63KH3w950vLfHVBqJmuczsC0u1qWXu6ob_E_BF3R1N9IVSdJcC49pfvEaDasGJgBK4Qah5SQJGJuhuBa4-kpmKRW5WfddHGbe1YwRirjt3V3gSeTm15ekYxXeWtuub39ehfeEdaGpE2t1GOcMfW1EqJZbItz2AyRvtlqAjJIdIgGHH9L0wx8Y1Kun-d16jO-JuGMbSIDPy-st8QELsls-CgO2cBQeh0FfScww-qZLFDG2kkHHY90d0bdzXhIyi-A98=w700-h469-no?authuser=0" class="d-block w-50 mx-auto" alt="...">
                    <div class="carousel-caption d-none d-md-block ">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://lh3.googleusercontent.com/gp-_8e-SOb439Tt5VZsUH5lDJvReilMCAGghC7zTsIeetvANsBPcp-MqIb8X7kTRusXAUSWVXSVCLd-RWDVtuijnewazBzW-ZwWvdI9nLb7hvsE7pogVWkar_XYH05aoPlpIttlKU8d5FRWxDwRlyf9A1uHTqqw6N339KDauRSI2zrIz4Vs3dmQ04vPc7S0cU8CvI3G_rvNSNi9Tz6r5vgHIt6m2dviXYaA5r-j8R0PfavzTSm50pz8bD57xOz9pZvhIRlENzJgy1sSVQ9QLNPTXXyQeCC7TqRjhGUI3Lpq3-2uTQQOlqwtPhErrD98vf4FnMmEflWat4O_eSgMa-pzABsuGraX7IvjrhvbTAKOoXvQBj50z5_pKeX3NYlI-pJAORIrvvGBj0XojJqKT73U3ex98Z08f3JEshOljG0ZRnQ-HZ8gB7O9_F8D5coRRg4ZRNdfycru1oWreAejxMclDsQAec23Se3DgBHCwNZ8-hnbGk8zLJqmWbpfBggGhsYw_oAAOSyumyAdckF-hKEtofhJOOIE1x8aZh7kOq37fNzVK2BFP3e_4DZk7bEUSVjxIqy8uqkaDlRRD6pAlCaKFzs-LPj8RCXx5b0oNexy3W-JzvWw1_XuN8PQ48MD4u2SmPE22yhwAm7z3bQ6z-4CSLzXdEua4Fesxt-IKccKJv6LJB9Vf_UMc0NaH54z5CK_9X4II1uhkPyBXdaSKdeF9=w1558-h915-no?authuser=0" class="d-block w-50 mx-auto" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


</body>

@endsection