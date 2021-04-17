#!/usr/bin/python3
import subprocess
import time
 
if __name__=='__main__':
    print('''
    Hey there, welcome to my server!\n
    Do you know Python?\n
    This is a python interpreter!, wrote anything you want, I will execute it for you!\n
    When you have finish to wrote your program, please enter "EOF"
    ''')

    while True:

        toExecute = input('Enter your code below:\n')

        currentInput = ''
        while currentInput != 'EOF' and toExecute != "EOF":
            currentInput = input()
            if currentInput != 'EOF':
                toExecute += '; '+currentInput
        toExecute = toExecute.replace("'",'"')
        if 'rm' in toExecute:
            print("Please don't disturb the instance. This will be reported.")
        else:
            cmd = "python3 -c '" + toExecute + "'"
            subprocess.call(cmd, shell=True)
            print("=============== END =================")
