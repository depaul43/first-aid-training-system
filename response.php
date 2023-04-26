
<?php
$questions = array(
    "What should I do if someone is choking?",
    "How do I treat a burn?",
    "What should I do if someone is having a seizure?",
    "What do I do if someone is bleeding?",
    "How do I recognize a heart attack?",
    "What should I do if someone has a head injury?",
    "What should I do for a broken bone?",
    "How do I stop a nosebleed?",
    "What should I do for a spider bite?",
    "What should I do for a snake bite?",
    "What should I do for CPR?",
    "How do I perform the Heimlich maneuver?",
    "What should I do if someone is unconscious?",
    "How do I treat a minor cut?",
    "What should I do if someone is having an asthma attack?",
    "What should I do if someone is having a stroke?",
    "How do I treat a bee sting?",
    "What should I do if someone is experiencing hypothermia?",
    "What should I do if someone is experiencing heat exhaustion?",
    "What should I do if someone is experiencing a seizure for the first time?",
    "How do I recognize a concussion?",
    "How do I treat a sprain or strain?",
    "What should I do if someone is experiencing an allergic reaction?",
    "What should I do if someone is having a panic attack?",
    "What should I do if someone has a foreign object in their eye?",
    "How do I perform CPR on an infant or child?",
);


$answers = array(
    "If someone is choking, give them abdominal thrusts (Heimlich maneuver) until the object blocking their airway is dislodged.",
    "For minor burns, run cool water over the affected area for 10-15 minutes. For more serious burns, seek medical attention immediately.",
    "If someone is having a seizure, move any nearby objects away from them and make sure they are in a safe place. Do not restrain them, but do place a soft object (like a pillow) under their head.",
    "If someone is bleeding, apply pressure to the wound with a clean cloth until the bleeding stops. Elevate the affected limb if possible.",
    "Common signs of a heart attack include chest pain or discomfort, shortness of breath, and sweating. If you suspect someone is having a heart attack, call 911 immediately.",
    "If someone has a head injury, check for signs of concussion such as confusion, dizziness, or loss of consciousness. If they have any of these symptoms, seek medical attention immediately.",
    "If someone has a broken bone, immobilize the affected area with a splint or sling, and seek medical attention immediately.",
    "To stop a nosebleed, have the person lean forward and pinch the soft part of their nose with a clean cloth for 10-15 minutes.",
    "For a spider bite, wash the affected area with soap and water, apply a cold compress to reduce swelling, and seek medical attention if symptoms worsen.",
    "For a snake bite, keep the affected limb immobilized and lower than the heart, and seek medical attention immediately.",
    "If someone is not breathing, call 911 and start CPR. Push hard and fast on the center of the chest at a rate of 100-120 compressions per minute, and give rescue breaths as needed.",
    "Stand behind the choking person and wrap your arms around their waist. Make a fist with one hand and place it just above their belly button. Grab your fist with your other hand and give quick, upward thrusts into their abdomen until the object blocking their airway comes out.",
    "If someone is unconscious, call 911 immediately. Check their breathing and pulse, and perform CPR if necessary.",
    "For a minor cut, clean the wound with soap and water and cover it with a sterile adhesive bandage. For a deep or severe cut, call 911 immediately.",
    "If someone is having an asthma attack, help them use their inhaler. If their symptoms do not improve or worsen, call 911 immediately.",
    "If someone is having a stroke, use the FAST acronym to check for symptoms: face drooping, arm weakness, speech difficulty, time to call 911. Call 911 immediately if you suspect a stroke.",
    "To treat a bee sting, remove the stinger if it is still in the skin and wash the affected area with soap and water. Apply a cold compress to reduce swelling.",
    "If someone is experiencing hypothermia, move them to a warm area and remove any wet clothing. Wrap them in warm blankets and call 911 immediately.",
    "Move them to a cool area, give them water to drink, and apply a cool compress to their forehead or neck",
    "Call for emergency assistance and protect their head from injury",
    "Look for symptoms such as headache, nausea, or confusion, and seek medical attention if symptoms worsen",
    "To treat a sprain or strain, follow the R.I.C.E. method: rest the affected area, ice the area for 20 minutes at a time, compress the area with a bandage, and elevate the affected limb.",
    "If someone is experiencing an allergic reaction, administer epinephrine if available, call for emergency medical help, and monitor the person's breathing and level of consciousness.",
    "If someone is having a panic attack, help them to breathe slowly and deeply, have them focus on a specific object, and encourage them to talk about their feelings.",
    "If someone has a foreign object in their eye, do not rub the eye. Instead, try to flush the object out with water, and if that doesn't work, cover the eye with a clean, dry patch or cloth and seek medical help.",
    "To perform CPR on an infant or child, use gentle compressions with only two fingers, give rescue breaths using a barrier device, and call for emergency medical help.",
);

$keywords = array(
    "choke",
    "burn",
    "seizure",
    "strain",
    "allergic reaction",
    "panic attack",
    "eye",
    "infant",
    "bleed",
    "concussion",
    "seizure",
    "hypothermia",
    "heart attack",
    "head injury",
    "broken bone",
    "nosebleed",
    "spider bite",
    "snake bite",
    "heat exhaustion",
    "cpr",
    "Heimlich maneuver",
    "unconscious",
    "cut",
    "asthma attack",
    "stroke",
    "bee sting",
);

$input = strtolower($_POST['message']);

for ($i = 0; $i < count($questions); $i++) {
    if (strpos(strtolower($questions[$i]), $input) !== false) {
        echo $answers[$i];
        exit;
    }
}

$matched_keywords = array();

foreach ($keywords as $keyword) {
    if (strpos($input, $keyword) !== false) {
        array_push($matched_keywords, $keyword);
    }
}

if (count($matched_keywords) > 0) {
    echo "I'm sorry, I didn't understand your question about " . implode(", ", $matched_keywords) . ". Please try asking a different question.";
} else {
    echo "I'm sorry, I didn't understand your question. Please try again.";
}

if(isset($_POST['submit'])) {
    $input = strtolower($_POST['message']);

    for ($i = 0; $i < count($questions); $i++) {
        if (strpos(strtolower($questions[$i]), $input) !== false) {
            $response = $answers[$i];
            break;
        }
    }

    $matched_keywords = array();

    foreach ($keywords as $keyword) {
        if (strpos($input, $keyword) !== false) {
            array_push($matched_keywords, $keyword);
        }
    }

    if (count($matched_keywords) > 0) {
        $response = "I'm sorry, I didn't understand your question about " . implode(", ", $matched_keywords) . ". Please try asking a different question.";
    } else {
        $response = "I'm sorry, I didn't understand your question. Please try a first aid keyword(s).";
    }
}
?>