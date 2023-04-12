<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Aid Training</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="style/style.css" rel="stylesheet"/>
</head>
<body>
    <div class="header">
    <div id="loader">
        <img src="images/animation.svg" alt="loader"/>
    </div>
    <div class="contents_burns">
        <a href="Accidents.php" class="back"><i class="fa fa-arrow-left"></i>Back</a>
        <h1>BURNS</h1>
        <div class="img_div burns">
            <img src="mages/burns.jpg" alt=""/>
        </div>
        <div class="major_burns">
            <h2>Is it a major or minor burn?</h2>
            <p class="call">
                Call the number or seek immediate care for major burns, which:
            </p>
                <ul>
                <li>Are deep</li>
                    <li>Cause the skin to be dry and leathery</li>
                    <li>May appear charred or have patches of white, brown or black</li>
                    <li>Are larger than 3 inches (about 8 centimeters) in diameter or cover the hands, 
                            feet, face,buttocks or a major joint.</li>
                </ul>
                <h2 class="major">Treating major burns Until emergency help arrives:</h2>
                <ul class="major_steps">
                    <li>Make sure you and the person who’s burned are safe and out of harm’s way. Move them away from the source of the burn. If it’s an electrical burn, 
                        turn off the power source before touching them.</li><br/>
                    <li>Check to see if they’re breathing. If needed, start rescue breathing if you’ve been trained.</li>
                    <li>Remove restrictive items from their body, such as belts and jewelry in or near the burned areas. Burned areas typically swell quickly</li>
                    <li>Cover the burned area. Use a clean cloth or bandage that’s moistened with cool, clean water.</li>
                    <li>Separate fingers and toes. If hands and feet are burned, separate the fingers and toes with dry and sterile, nonadhesive bandages.</li>
                    <li>Remove clothing from burned areas, but don’t try to remove clothing that’s stuck to the skin.</li>
                    <li>Avoid immersing the person or burned body parts in water. Hypothermia (severe loss of body heat) can occur if you immerse large, severe burns in water.</li>
                    <li>Raise the burned area. If possible, elevate the burned area above their heart.</li>
                    <li>Watch for shock. Signs and symptoms of shock include shallow breathing, pale complexion, and fainting.</li>
                </ul>
                    <div class="img_div">
                        <img src="images/electrical_burn.jpg" alt="electrical_burn"/>
                    </div>
        </div>
        <div class="minor">
            <h3>
                Treating minor burns:
            </h3>
            <ul>
                <li>Cool down the burn. After holding the burn under cool, running water, apply cool, wet compresses until the pain subsides.</li>
                <li>Remove tight items, such as rings, from the burned area. Be gentle, but move quickly before swelling starts.</li>
                <li>Avoid breaking blisters. Blisters with fluid protect the area from infection. If a blister breaks, clean the area and gently apply an antibiotic ointment.</li>
                <li>Apply a moisturizing lotion, such as one with aloe vera. After the burned area has been cooled, apply a lotion to provide relief and to keep the area from drying out.</li>
                <li>Loosely bandage the burn. Use sterile gauze. Avoid fluffy cotton that could shed and get stuck to the healing area. Also avoid putting too much pressure on the burned skin.</li>
                <li>Take an over-the-counter pain reliever if necessary. Consider acetaminophen (Tylenol), ibuprofen (Advil), or naproxen (Aleve).</li>
            </ul>
            <div class="img_div">
                <img src="images/minor.jpg" alt="minor_burn"/>
            </div>
        </div>
    </div>
    <script>
        const loaded=document.getElementById('loader')
        const contents_burns=document.querySelector('.contents_burns')
        setTimeout(() => {
            loaded.style.display='none';
            contents_burns.style.display='flex'
        }, 3000);
    </script>
    <script src="js/index.js"></script>
</body>
</html>