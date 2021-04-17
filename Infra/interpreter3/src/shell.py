#!/usr/bin/python2.7
import time
import os
import re

if __name__=='__main__':
    print('''
    Hey there, welcome to my updated server!\n
    Last time you have succeed to see my super super super secret files, now you can't!\n
    This is no more a python interpreter, just a calcualtor, so, deal with it :)
    ''')

    while True:
        try:
            toCompute = input("Enter your calcul below:\n")
            if re.match('^[a-zA-Z]+$',str(toCompute)): 
                    print('Sorry but this is just a simple calculator, not a python interpreter or whatever.')
            else:
                if('bash' in toCompute or 'sh' in toCompute or 'tsh' in toCompute or 'zsh' in toCompute or 'os' in toCompute or 'subprocess' in toCompute):
                    print("What are you doing here ???? Exiting script now!")
                else:
                    res = eval(toCompute)
                    print(str(toCompute)+'='+str(res))
        except:
            print('Sorry but something went wrong, try again.')
        