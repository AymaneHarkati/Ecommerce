import os
import pyaudio
import pyautogui
import time
import pydirectinput
from window_helper import WindowMgr
import speech_recognition as sr

w = WindowMgr()


def get_audio():
    print("talk")
    r = sr.Recognizer()
    with sr.Microphone() as source:
        audio = r.listen(source)
        said = ""
        try:
            said = r.recognize_google(audio)
            print(said)
        except Exception as e:
            print("Exception 1 "+str(e))
    return said


def voice_action():
    # initialized pyautogui
    pyautogui.FAILSAFE = True
    # countdown timer
    print("starting", end="")

    for i in range(0, 10):
        print('.', end="")
        time.sleep(1)
    print("GO")
    # Action try :
    try:
        while get_audio() != "stop":
            if get_audio() == "hello":

                pydirectinput.press('e')
                pydirectinput.press('j')
                time.sleep(5)
                
                pydirectinput.press('e')
                pydirectinput.press('l')
    except Exception as e:
        print("Exception 2 "+str(e))


def game_focus():
    # Game window is named 'Minecraft 1.13.1' for example.
    w.find_window_wildcard("FIFA 22")
    w.set_foreground()


def main():
    game_focus()
    voice_action()


# programme callback
main()
# final
print("Done")
os.system('pause')
