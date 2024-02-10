@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;"> 
    <button class="spaces"> <label  class="subjectname" > الدردشة </label><img src="{{Vite::image("conversation (3).png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-name">تقنة معلومات</div>
</div>

</div>

<div class="hr3-mobile-chat" >
    <a href="{{route("student")}}"> <button id="spacesbtn" class="spaces" > <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button></a>

    <div id="student-group-chat-name"> مجموعة(1) - طلاب </div>

</div>
@endsection
@section("content")

<div class="container"   id="container-chatting" >
    <div class="card" id="chatting-card">
       <div class="card" id="header-chatting-card">
         <a href="{{route("student")}}">  <img src="{{Vite::image("left-arrow.png")}}" id="back"  width="30px"></a>
        <div id="student-group-chat-name"> مجموعة(1) - طلاب </div>
     </div>

     <div class="senders-chatting">

        <div class="card" id="sendersMessages-chatting"> السلام عليكم ورحمة الله وبركاته
            <div class="sendingdate-chatting">
                pm.10:24
            </div>
        </div>

    </div>
    <div class="recivers-chatting">
     <div class="card" id="user-icon-chatting"></div>
        <div class="card" id="reciversMessages-chatting">وعليكم السلام ورحمة الله وبركاته
            <div class="recivinggdate-chatting">
                pm.10:24
            </div>
        </div>
        <div class="card" id="user-icon-chatting"></div>
        <div class="card" id="reciversMessages-chatting">وعليكم السلام ورحمة الله وبركاته
            <div class="recivinggdate-chatting">
                pm.10:24
            </div>
        </div>
    </div>

    <!-- <div class="recivers-chatting">
        <div class="card" id="user-icon-chatting"></div>

           <div class="card" id="reciversMessages-chatting">وعليكم السلام ورحمة الله وبركاته
               <div class="recivinggdate-chatting">
                   pm.10:24
               </div>
           </div>
       </div> -->

    <div class="senders-chatting">

        <div class="card" id="sendersMessages-chatting"> لو تأملت يومك قليلاً .
            ‏لوجدت أنك تعيش في سلسلة من النعم المُختلفة التي تُصاحبك كل لحظة دون أن تستشعرها، صحتك، طعامك، منزلك، عائلتك، أصدقائك، قلبك الذي ينبض، تنفسك، قدرتك على النوم .
            ‏الحمدلله دائماً وأبداً…
            <div class="sendingdate-chatting">
                pm.10:24
            </div>
        </div>

    </div>


    <div class="recivers-chatting">
        <div class="card" id="user-icon-chatting"></div>
        <div class="card" id="reciversMessages-chatting"> ‏"يا بُنيّ، إذا أراد الله أمرًا هيَّأ أسبابه، فرُبما سعى المرء بكُلّ سبب فلم يفلح، ثم يَقع له سبب لم يمتهِد له وسيلة قطُّ فإذا هو عند بُغيته، وإذا هو قد ملأ يديهِ مما كان قد يَئِس منه، فلا يكون عجبهُ كيفَ خاب في الأُولى بأشدَّ مِن عجبهِ كيف نجح في الثانية!"
            - مصطفى صادق الرافعي.
            <div class="recivinggdate-chatting">
                pm.10:24
            </div>
        </div>
    </div>


    <div class="senders-chatting">

        <div class="card" id="sendersMessages-chatting"> ‏"يا بُنيّ، إذا أراد الله أمرًا هيَّأ أسبابه، فرُبما سعى المرء بكُلّ سبب فلم يفلح، ثم يَقع له سبب لم يمتهِد له وسيلة قطُّ فإذا هو عند بُغيته، وإذا هو قد ملأ يديهِ مما كان قد يَئِس منه، فلا يكون عجبهُ كيفَ خاب في الأُولى بأشدَّ مِن عجبهِ كيف نجح في الثانية!"

            - مصطفى صادق الرافعي.
            <div class="sendingdate-chatting">
                pm.10:24
            </div>
        </div>
    </div>


    
    <div class="senders-chatting">

        <div class="card" id="sendersMessages-chatting"> ‏«إنَّ الإيمَانَ مُستقرٌّ فِي أعماقِ كلّ قلب، ولكنّه يحتَاج إلىٰ هزّة شَديدة تُبديه و تُظهِره، لذَلكَ كانتِ المَصائب والأَزَمات سَببًا لظُهور الإيمَان» 

            ‏— الطنطاوي.
            <div class="sendingdate-chatting">
                pm.10:24
            </div>
        </div>

        
    </div>

    <div class="recivers-chatting">
        <div class="card" id="user-icon-chatting"></div>
        <div class="card" id="reciversMessages-chatting"> ‏"يا بُنيّ، إذا أراد الله أمرًا هيَّأ أسبابه، فرُبما سعى المرء بكُلّ سبب فلم يفلح، ثم يَقع له سبب لم يمتهِد له وسيلة قطُّ فإذا هو عند بُغيته، وإذا هو قد ملأ يديهِ مما كان قد يَئِس منه، فلا يكون عجبهُ كيفَ خاب في الأُولى بأشدَّ مِن عجبهِ كيف نجح في الثانية!"

            - مصطفى صادق الرافعي.
            <div class="recivinggdate-chatting">
                pm.10:24
            </div>
        </div>
        <div class="card" id="user-icon-chatting"></div>
        <div class="card" id="reciversMessages-chatting"> ‏"يا بُنيّ، إذا أراد الله أمرًا هيَّأ أسبابه، فرُبما سعى المرء بكُلّ سبب فلم يفلح، ثم يَقع له سبب لم يمتهِد له وسيلة قطُّ فإذا هو عند بُغيته، وإذا هو قد ملأ يديهِ مما كان قد يَئِس منه، فلا يكون عجبهُ كيفَ خاب في الأُولى بأشدَّ مِن عجبهِ كيف نجح في الثانية!"
            - مصطفى صادق الرافعي.
            <div class="recivinggdate-chatting">
                pm.10:24
            </div>
        </div>
    </div>


    <div class="senders-chatting">

        <div class="card" id="sendersMessages-chatting"> ‏«إنَّ الإيمَانَ مُستقرٌّ فِي أعماقِ كلّ قلب، ولكنّه يحتَاج إلىٰ هزّة شَديدة تُبديه و تُظهِره، لذَلكَ كانتِ المَصائب والأَزَمات سَببًا لظُهور الإيمَان» 

            ‏— الطنطاوي.
            <div class="sendingdate-chatting">
                pm.10:24
            </div>
        </div>

    </div> 
      <div class="senders-chatting">

        <div class="card" id="sendersMessages-chatting"> ‏«إنَّ الإيمَانَ مُستقرٌّ فِي أعماقِ كلّ قلب، ولكنّه يحتَاج إلىٰ هزّة شَديدة تُبديه و تُظهِره، لذَلكَ كانتِ المَصائب والأَزَمات سَببًا لظُهور الإيمَان» 

            ‏— الطنطاوي.
            <div class="sendingdate-chatting">
                pm.10:24
            </div>
        </div>

    </div>   
    <div class="senders-chatting">

        <div class="card" id="sendersMessages-chatting"> ‏«إنَّ الإيمَانَ مُستقرٌّ فِي أعماقِ كلّ قلب، ولكنّه يحتَاج إلىٰ هزّة شَديدة تُبديه و تُظهِره، لذَلكَ كانتِ المَصائب والأَزَمات سَببًا لظُهور الإيمَان» 
            ‏— الطنطاوي.
            <div class="sendingdate-chatting">
                pm.10:24
            </div>
        </div>
    </div>




    <div class="recivers-chatting">
        <div class="card" id="user-icon-chatting"></div>
        <div class="card" id="reciversMessages-chatting"> ‏"يا بُنيّ، إذا أراد الله أمرًا هيَّأ أسبابه، فرُبما سعى المرء بكُلّ سبب فلم يفلح، ثم يَقع له سبب لم يمتهِد له وسيلة قطُّ فإذا هو عند بُغيته، وإذا هو قد ملأ يديهِ مما كان قد يَئِس منه، فلا يكون عجبهُ كيفَ خاب في الأُولى بأشدَّ مِن عجبهِ كيف نجح في الثانية!"
            - مصطفى صادق الرافعي.
            <div class="recivinggdate-chatting">
                pm.10:24
            </div>
        </div>
    <!-- </div>

    <div class="recivers-chatting"> -->
        <div class="card" id="user-icon-chatting"></div>
        <div class="card" id="reciversMessages-chatting"> ‏"يا بُنيّ، إذا أراد الله أمرًا هيَّأ أسبابه، فرُبما سعى المرء بكُلّ سبب فلم يفلح، ثم يَقع له سبب لم يمتهِد له وسيلة قطُّ فإذا هو عند بُغيته، وإذا هو قد ملأ يديهِ مما كان قد يَئِس منه، فلا يكون عجبهُ كيفَ خاب في الأُولى بأشدَّ مِن عجبهِ كيف نجح في الثانية!"
            - مصطفى صادق الرافعي.
            <div class="recivinggdate-chatting">
                pm.10:24
            </div>
        </div>
    </div>


     <div class="input-group" id="input-group-chatting">
     <input type="text" id="message-input" class="form-control" placeholder="Type your message...">
     <div class="input-group-append">
      <button id="send-button" class="btn btn-light"><img src="{{Vite::image("send.png")}}"  id="" width="25px">
      </button>
     </div>
     </div>
    </div>
</div>

@endsection