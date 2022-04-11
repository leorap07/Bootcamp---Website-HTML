import random

#Lists to Append and Stuff
Previous_Combinations = []
Giver = []
Receiver = []
Secret_Pairs = []

#Function to Enter Participants
def Enter_Participants():
    Participants = input("How many participants?")
    PNo = int(Participants)
    print(PNo)
    while PNo != 0:
        person = str(input("Enter participant name:"))
        Giver.append(person)
        Receiver.append(person)
        PNo -= 1

#Function to assign givers and receivers
def Secret_Pairs_Assignment():
    for name in Giver:
        give = random.choice(Receiver)
        if name == give:
            random.choice(Receiver)
        Receiver.remove(give)    
        Secret_Pairs.append(f'{name} --> {give}')

Enter_Participants()
Secret_Pairs_Assignment()
print(Secret_Pairs)