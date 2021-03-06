#!/usr/bin/env python3

from tkinter import *
from tkinter import ttk

# tkinter
root = Tk()

# vars
input = StringVar()
last_input = DoubleVar()
op_mode = BooleanVar()
last_op = StringVar()


input.set('0')
last_input.set(0)
op_mode.set(False)

# functions
def set_number(number) :
    value = input.get()
    mode = op_mode.get()
    if mode is False :
        if number == 0 and value == '0' :
            pass
        elif number != 0 and value == '0' :
            value = str(number)
        else :
            value += str(number)
        input.set(value)
    else :
        last_input.set(float(value))
        input.set(str(number))
        op_mode.set(False)

def set_dot() :
    value = input.get()
    if '.' not in value :
        value += str('.')
        input.set(value)

def set_posi_negi() :
    value = input.get()
    number = float(value)
    if number > float(0) :
        value = str('-') + value
    elif number < float(0) :
        value = value.lstrip('-')
    else :
        pass
    input.set(value)

def operator(type) :

    current = float(input.get())
    last = last_input.get()
    if op_mode.get() is True :
        last_op.set(type)
    else :
        if last != 0 :
            if type == '+' :
                input.set(str(last + current))
            elif type == '-' :
                input.set(str(last - current))
            elif type == '*' :
                input.set(str(last * current))
            elif type == '/' :
                input.set(str(last / current))
            elif type == '%' :
                input.set(str(last % current))

        last_op.set(type)
        op_mode.set(True)

def clear() :
    input.set('0')
    last_input.set(0)
    op_mode.set(False)

def equal() :
    current = float(input.get())
    last = last_input.get()
    op = last_op.get()
    if op_mode.get() is True :
        pass
    else :
        if op == '+' :
            input.set(str(last + current))
        elif op == '-' :
            input.set(str(last - current))
        elif op == '*' :
            input.set(str(last * current))
        elif op == '/' :
            input.set(str(last / current))
        elif op == '%' :
            input.set(str(last % current))
        op_mode.set(True)
    
# gui
window = ttk.Frame(root)
result = ttk.Entry(window, text='0', textvariable=input , justify='right')

btn_?????? = ttk.Button(window, text="+/-", command=lambda: set_posi_negi())
btn_??? = ttk.Button(window, text=".", command=lambda: set_dot())

btn_??? = ttk.Button(window, text="0", command=lambda: set_number(0))
btn_??? = ttk.Button(window, text="1", command=lambda: set_number(1))
btn_??? = ttk.Button(window, text="2", command=lambda: set_number(2))
btn_??? = ttk.Button(window, text="3", command=lambda: set_number(3))
btn_??? = ttk.Button(window, text="4", command=lambda: set_number(4))
btn_??? = ttk.Button(window, text="5", command=lambda: set_number(5))
btn_??? = ttk.Button(window, text="6", command=lambda: set_number(6))
btn_??? = ttk.Button(window, text="7", command=lambda: set_number(7))
btn_??? = ttk.Button(window, text="8", command=lambda: set_number(8))
btn_??? = ttk.Button(window, text="9", command=lambda: set_number(9))

btn_?????? = ttk.Button(window, text="+", command=lambda: operator('+'))
btn_?????? = ttk.Button(window, text="-", command=lambda: operator('-'))
btn_?????? = ttk.Button(window, text="*", command=lambda: operator('*'))
btn_?????? = ttk.Button(window, text="/", command=lambda: operator('/'))
btn_?????? = ttk.Button(window, text="%", command=lambda: operator('%'))

btn_?????? = ttk.Button(window, text="C", command=clear)
btn_?????? = ttk.Button(window, text="<-")
btn_?????? = ttk.Button(window, text="=", command=equal)

# grid
window.grid(row=0, column=0)
result.grid(row=0, column=0, columnspan=4, sticky=(N, S, E, W))

btn_??????.grid(row=1, column=0)
btn_??????.grid(row=1, column=1)
btn_??????.grid(row=1, column=2)
btn_??????.grid(row=1, column=3)

btn_???.grid(row=2, column=0)
btn_???.grid(row=2, column=1)
btn_???.grid(row=2, column=2)
btn_??????.grid(row=2, column=3)

btn_???.grid(row=3, column=0)
btn_???.grid(row=3, column=1)
btn_???.grid(row=3, column=2)
btn_??????.grid(row=3, column=3)

btn_???.grid(row=4, column=0)
btn_???.grid(row=4, column=1)
btn_???.grid(row=4, column=2)
btn_??????.grid(row=4, column=3)

btn_??????.grid(row=5, column=0)
btn_???.grid(row=5, column=1)
btn_???.grid(row=5, column=2)
btn_??????.grid(row=5, column=3)

root.mainloop()
