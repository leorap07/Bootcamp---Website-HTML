
#!/usr/bin/python3
#Checker CRY200
import modules
integerNumber = 5311
largestPossible = \
int(pow(integerNumber, .5))
strFactors = []
myInt = integerNumber

test = 2
while(myInt >= largestPossible):
    if(myInt % test ==0):
        myInt/=test
    else:
        test=test+1
if(myInt>1):
    strFactors.append(test)
