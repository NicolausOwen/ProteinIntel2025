<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protein Website</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

    <!-- CAT Section -->
    <section class="py-16">
        <div class="p-6 relative flex flex-col-reverse lg:flex-row overflow-hidden h-auto bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] lg:h-[350px]">
            
            <div class="hidden lg:flex w-full h-full absolute inset-0 z-0">
                <div class="w-1/5 bg-white"></div>
                <div class="w-4/5 bg-gradient-to-r from-[#B8CFCE] to-[#7F8CAA]"></div>
            </div>

            <div class="w-full gap-2 relative flex flex-col lg:flex-row items-center px-6 lg:px-10">
                
                <div class="w-[80%] md:w-[60%] h-[95%] lg:ml-[-100px] flex justify-center lg:mx-6 mb-4 lg:mb-0">
                        <img src="{{ asset('img/gambar.jpg') }}" alt="gambar" class="rounded-[200px] w-full max-w-lg h-auto object-cover">
                </div>

                <div class="w-full lg:w-[40%] text-center lg:mr-auto">
                    <h1 class="text-2xl lg:text-3xl font-extrabold mb-4 text-black text-justify">
                        GETTING STARTED TO PROTEIN 2025
                    </h1>
                    <p class="text-sm lg:text-base mb-8 text-black text-justify">
                        Unlock boundless opportunities with <strong>PROTEIN!</strong> Develop your English skills, Ace the USEPT, and Step further into a bright future.
                    </p>
                    <div class="flex justify-center lg:justify-start">
                        <button class="bg-[#585a7d] text-white font-semibold py-3 px-8 text-shadow-lg rounded-full shadow-2xl hover:shadow-xl hover:bg-[#333446] transition duration-300 transform hover:scale-105">
                            START NOW
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Penjelasan Singkat Section -->
    <section class="p-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold mb-8 text-shadow-lg">
                What is PROTEIN?
            </h2>
            <p class="text-sm lg:text-base max-w-3xl mx-auto text-justify">
                PROTEIN is TOEFL/USEPT test simulation for Sriwijaya Univesity Students, where students can practice solving TOEFL like problems. This activity is to introduce Unsri students, especially at the Faculty of Computer Science with USEPT test problems and also help students to improve their ability to answer questions.
            </p>
        </div>
    </section>

    <!-- Keunggulan Section -->
    <section class="p-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold mb-12 text-shadow-lg">
                Why Take PROTEIN?
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-y-12 gap-x-8 grid-cols-1 place-items-center">
                <div class="bg-[linear-gradient(135deg,_#EAEFEF_0%,_#D1DFDF_80%,_#B8CFCE_100%)] w-full md:w-[75%] min-h-[200px] p-8 rounded-lg shadow-xl hover:shadow-xl/25 transition duration-300 transform hover:-translate-y-2 hover:bg-[linear-gradient(135deg,_#B8CFCE_0%,_#D1DFDF_70%,_#EAEFEF_100%)]">
                    <h3 class="text-xl font-semibold mb-3 text-center">AAAAA</h3>
                    <p class="text-center text-sm lg:text-base">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, eos ab. Tempora suscipit sunt neque animi sapiente laborum nobis vel.
                </div>

                <div class="bg-[linear-gradient(135deg,_#EAEFEF_0%,_#D1DFDF_80%,_#B8CFCE_100%)] w-full md:w-[75%] min-h-[200px] p-8 rounded-lg shadow-xl hover:shadow-xl/25 transition duration-300 transform hover:-translate-y-2 hover:bg-[linear-gradient(135deg,_#B8CFCE_0%,_#D1DFDF_70%,_#EAEFEF_100%)]">
                    <h3 class="text-xl font-semibold mb-3 text-center">AAAAA</h3>
                    <p class="text-center text-sm lg:text-base">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos earum illo sit dolorum? Ipsam sed ratione tempora exercitationem dicta. Nostrum.
                    </p>
                </div>

                <div class="bg-[linear-gradient(135deg,_#EAEFEF_0%,_#D1DFDF_80%,_#B8CFCE_100%)] w-full md:w-[75%] min-h-[200px] p-8 rounded-lg shadow-xl hover:shadow-xl/25 transition duration-300 transform hover:-translate-y-2 hover:bg-[linear-gradient(135deg,_#B8CFCE_0%,_#D1DFDF_70%,_#EAEFEF_100%)]">
                    <h3 class="text-xl font-semibold mb-3 text-center">AAAAA</h3>
                    <p class="text-center text-sm lg:text-base">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum similique exercitationem harum omnis saepe, soluta ut fugiat mollitia dicta possimus.
                    </p>
                </div>

            </div>
        </div>
    </section>
    
</body>
</html>